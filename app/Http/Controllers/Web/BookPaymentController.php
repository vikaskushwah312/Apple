<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty,Book,Payment};

use Validator,Redirect,Session,Config,Auth;

class BookPaymentController extends Controller{

	public function book(Request $request){
		$user_id = auth('user')->id();
		if($request->isMethod('post')){
			$validation = Validator::make($request->all(),[
            'tenure'    => 'required',
            ]);
            if ($validation->fails()) {
              return Redirect::back()->withErrors($validation)->withInput();
            }else{
            	$payment_data = array('amount' =>$request->amount,
            						  'property_id' => $request->property_id,
            						  'created_at'    => date('Y-m-d H:i:s'),
            							);

            	$payment_id = Payment::insertGetId($payment_data);

            	if($payment_id){
	                $data = array(  'tenure'  => $request->tenure,
	                				'property_id' => $request->property_id,
	                				'user_id' => $user_id,
	                				'created_at'    => date('Y-m-d H:i:s'),
	            				 );
                	$booked_id = Book::insertGetId($data);
                	//for updated the property i.e. book so it will not show for rent
                	Property::where(['id'=>$request->property_id])->update(['booked'=>1]);
                	if ($booked_id) {
                  		return Redirect::to("pg/booked-list")->withSuccess('You have successfully booked the property.');
	                }else{
	                	
	                  return Redirect::back()->withFail('Something went to wrong.');
	                }
            	} else{
            		die('payment issue');
            	}
                
            }

		} else {

			$property_id = Session::get('property_id');
			//Session forgot code here
			$data['title'] = 'Book and Payment Page';
			$data['result'] = Property::where('id',$property_id)->orderBy('created_at','desc')->first();
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

	//get the all property booked by user
	public function bookList(Request $request){

		$data['title'] =  "My Booked Properties";
        $data['property'] = Book::where(['p_status'=>'Active','user_id'=>auth('user')->id()])
        					->leftjoin('property','book.property_id','=','property.id')
        					->orderBy('book.created_at','desc')
        					->get(['book.*','property.*']);
        
        return view('web.pg.dashboard.booked_list',$data);

	}

}