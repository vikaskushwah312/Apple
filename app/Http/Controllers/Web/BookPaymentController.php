<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty,Book,Payment};

use Validator,Redirect,Session,Config,Auth;
use PaytmWallet;

class BookPaymentController extends Controller{

	public function book(Request $request){
		$user_id = auth('user')->id();
		if($request->isMethod('post')){
			$validation = Validator::make($request->all(),[
            'tenure'    => 'required',
            'amount'    => 'required',
            ]);
            if ($validation->fails()) {
              return Redirect::back()->withErrors($validation)->withInput();
            }else{
		        $order_id= rand(1,999999);
		        $payment_data = array(	'order_id' => $order_id,
		        						'property_id' => $request->property_id,
		            					'user_id' => $user_id,
		            					'tenure'  => $request->tenure,
		            					'amount' =>$request->amount,
		            					'start_date' =>$request->start_date,
		            					'end_date' =>$request->end_date,
		        						'created_at'    => date('Y-m-d H:i:s'),
		            					);
		        //basic payment store in database
		        Payment::insertGetId($payment_data);
		        $user_data = User::find($user_id);
		        //prepare for payment
		        $payment = PaytmWallet::with('receive');

		        $payment->prepare([
		          'order' => $order_id,
		          'user' => $user_id,
		          'mobile_number' => $user_data->contact_no,
		          'email' => $user_data->email,
		          'amount' => $request->amount,
		          'callback_url' => url('api/payment/status')
		        ]);
		        return $payment->receive();
            }

		} else { //get method

			$property_id = Session::get('property_id');
			//The pull method will retrieve and delete an item from the session in a single statement
			// $property_id = $request->session()->pull('property_id');
			$data['title'] = 'Book and Payment Page';
			$data['result'] = Property::where('id',$property_id)->orderBy('created_at','desc')->first();
			// print_r($property_id);die;
	        $data['images'] = GalleryImage::where('property_id',$property_id)->get();
	        $data['features'] = Features::where('status','Active')->get();
		    $pro_features = PropertyFeatures::where(['property_id'=>$property_id])->get(['feature_id']);
		        $data['propertey_features'] = [];
		        foreach ($pro_features as $key => $value) {
		            $data['propertey_features'][] = $value->feature_id;
		        }
		}

        return view('web.pg.dashboard.properte_book',$data);
	}
	/*
	*purpose :: this is called by paytm use api.php file for payment status  
	*/
	public function paymentCallback()
    {	
    	
        $transaction = PaytmWallet::with('receive');
 
        $response = $transaction->response();
        // print_r($response);die; to see the all the responce
        $order_id = $transaction->getOrderId(); //get the order id

        if($transaction->isSuccessful()){
        	Payment::where('order_id',$response['ORDERID'])->update(['status'=>'success', 'payment_id'=>$response['TXNID']]);
        	$payment_info = Payment::where(['order_id'=>$response['ORDERID'],'status'=>'success', 'payment_id'=>$response['TXNID'] ])->first();
        	// dd('Payment successfully');
        
 		//1.payment successfully completed then book the property
 			$data = array(  'order_id'  => $payment_info->order_id,
            				'property_id' => $payment_info->property_id,
            				'user_id' => $payment_info->user_id,
            				'created_at'    => date('Y-m-d H:i:s'),
	            		);
            $booked_id = Book::insertGetId($data); 
        //2.update the property this is booked
        //for updated the property i.e. book so it will not show for rent
        	$pro = Property::where(['id'=>$payment_info->property_id])->update(['booked'=>1]);
        //*Sesstion distory here property wala
        	if ($booked_id && $pro) {
        		// return Redirect::to("owner/my-profile")->withSuccess('You have Successfull Updated.');
          		return Redirect::to("pg/booked-list")->withSuccess('You have successfully booked the property.');
            }else{
              return Redirect::back()->withFail('Something went to wrong.');
            }
        }else if($transaction->isFailed()){
          Payment::where('order_id',$order_id)->update(['status'=>'failed', 'payment_id'=>$response['TXNID']]);
          return Redirect::back()->withFail('Something went to wrong.');
          // dd('Payment Failed. Try again lator');
        }
    }

	//get the all property booked by user
	public function bookList(Request $request){

		$data['title'] =  "My Booked Properties";
        $data['property'] = Book::where(['p_status'=>'Active','user_id'=>auth('user')->id()])
        					->leftjoin('property','book.property_id','=','property.id')
        					->orderBy('book.created_at','desc')
        					->get(['book.*','property.*']);
        
        return view('web.pg.dashboard.booked_list',$data);

	}


	/*
	* Payment option
	*/
	public function payment(Request $request){
		if ($request->session()->exists('pg')) {
			//done the payment transtion
			$user_id = auth('user')->id();
			$property_id = Book::where('user_id',$user_id)->first();
			$data['title'] = 'Payment Page';
			if (!empty($property_id->id)) {
				
				$data['property_id'] = $property_id->id;
				$property_id = $property_id->id;
				$data['result'] = Property::where('id',$property_id)->orderBy('created_at','desc')->first();
				// print_r($data['result']);die;
		        $data['images'] = GalleryImage::where('property_id',$property_id)->get();
		        $data['features'] = Features::where('status','Active')->get();
			    $pro_features = PropertyFeatures::where(['property_id'=>$property_id])->get(['feature_id']);
			        $data['propertey_features'] = [];
			        foreach ($pro_features as $key => $value) {
			            $data['propertey_features'][] = $value->feature_id;
			        }

				return view('web.pg.rent.rent',$data);
			}else{

				return Redirect::to("pg/dashboard")->withSuccess('First Book Any Property.');
			}
		} else {
			return view('web.home.login');
		}
	}
}