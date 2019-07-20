<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty};
use Validator,Redirect,Session;
// *****************************notification ***********
use App\Notifications\Complain;
use App\Models\Notification;


class HomeController extends Controller
{
    //This is for Home page
    public function home(Request $request){
        
        //This property list shwo in the home page
        $data['result'] = FeaturedProperty::where(['featured_property.status'=>'Active','booked'=>0])
                                            ->leftjoin('property','featured_property.property_id','=','property.id')
                                            ->get(['property.*']);
        $data['count'] =count($data['result']);

        //total show for counter
        // total property for rent
        $data['property'] = Property::where('p_status','Active')->count();
        //total user regiteras owner
        $data['owner'] = User::where(['status'=>'Active','user_type'=>2])->count();
        //total user regiteras customer
        $data['customer'] = User::where(['status'=>'Active','user_type'=>3])->count();
        return view('layouts.home',$data);
        // return view('layouts.master');
    }
    public function homeFilter(Request $request){

        try{
            if($request->ajax()){

                $query = Property::query();
                $box = $request->all();        
                $myValue=  array();
                parse_str($box['formvalue'], $myValue);
                $address   = $myValue['location']; 
                $share_bed = $myValue['share_bed'];
                $room      = $myValue['rooms'];
                $type      = $myValue['type'];
                $bathroom  = $myValue['bathroom'];
                // $min_area  = $myValue['min_area']; //area
                // $max_area  = $myValue['max_area'];
                // $min_price = $myValue['min_price'];
                // $max_price = $myValue['max_price'];

                
                $query = Property::query();    
                $query->where('booked',0);
                if($address != ''){
                    $query->where('address', "LIKE", "%".$address."%");
                }
                $query->when($share_bed, function ($query, $share_bed) {
                        return $query->where('share_bed', $share_bed);
                    })
                    ->when($room, function ($query, $room) {
                            return $query->where('room', $room);
                    })
                    ->when($type, function ($query, $type) { //ac /non-ac
                        return $query->where('type', $type);
                    })
                    ->when($bathroom, function ($query, $bathroom) {
                        return $query->where('bathroom', $bathroom);
                    })
                /*    ->when($min_area, function ($query, $min_area) {
                        return $query->where('area','>=',$min_area);
                    })
                    ->when($max_area, function ($query, $max_area) {
                        return $query->where('area','<=',$max_area);
                    })
                   ->when($min_price, function ($query, $min_price) {
                        return $query->where('price','>=',$min_price);
                    })
                    ->when($max_price, function ($query, $max_price) {
                        return $query->where('price','<=',$max_price);
                    })*/
                    ->orderBy('updated_at','desc');

                $data['result'] = $query->paginate(2);
                // print($address);
                // print(count($data['result']));die;
                $data['count'] = count($data['result']);

                // print(count($data['result']));die;
                $res = ['status'=>true ,'data'=>view('web.home.filter_page',$data)->render()];
                return $res;
              
            } else {

                $address = $request->location;
                $share_bed = $request->share_bed;
                $room = $request->room;
                $type = $request->type;
                // print($share_bed);die;
                // $query->where(['p_status'=>'Active']);
                  
                $data['result'] = [];
                if($address || $share_bed || $room || $type){
                    $query = Property::query();    
                    $query->where('booked',0);
                        if($address != ''){
                            $query->where('address', "LIKE", "%".$address."%");
                        }
                $query->when($share_bed, function ($query, $share_bed) {
                            return $query->where('share_bed', $share_bed);
                        })
                        ->when($room, function ($query, $room) {
                                return $query->where('room', $room);
                        })
                        ->when($type, function ($query, $type) {
                            return $query->where('type', $type);
                        })
                        ->orderBy('updated_at','desc');

                $data['result'] = $query->paginate(2);
                }
                /*if($request->page){
                    print($request->page);
                }
                print_r($request->all());die;*/
                
                $data['count'] = count($data['result']);
                // print_r(count($data['result']));die;
                // print(count($data));
                // print_r($data);
                // die;
                $data['address']    = $address;
                $data['share_bed']  = $share_bed;
                $data['room']       = $room;
                $data['type']       = $type;
                return view('web.home.properte_list',$data);
            }
        
        }catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
    }
    public function advanceSearch(Request $request){
        if($request->ajax()){
            
            $query = Property::query();
            $box = $request->all();        
            $myValue=  array();
            parse_str($box['formvalue'], $myValue);
            $address   = $myValue['location']; 
            $share_bed = $myValue['share_bed'];
            $room      = $myValue['rooms'];
            $type      = $myValue['type'];
            $bathroom  = $myValue['bathroom'];
            // $min_area  = $myValue['min_area']; //area
            // $max_area  = $myValue['max_area'];
            // $min_price = $myValue['min_price'];
            // $max_price = $myValue['max_price'];

            
            $query = Property::query();   
            $query->where('booked',0); 
            if($address != ''){
                $query->where('address', "LIKE", "%".$address."%");
            }
            $query->when($share_bed, function ($query, $share_bed) {
                    return $query->where('share_bed', $share_bed);
                })
                ->when($room, function ($query, $room) {
                        return $query->where('room', $room);
                })
                ->when($type, function ($query, $type) { //ac /non-ac
                    return $query->where('type', $type);
                })
                ->when($bathroom, function ($query, $bathroom) {
                    return $query->where('bathroom', $bathroom);
                })
            /*    ->when($min_area, function ($query, $min_area) {
                    return $query->where('area','>=',$min_area);
                })
                ->when($max_area, function ($query, $max_area) {
                    return $query->where('area','<=',$max_area);
                })
               ->when($min_price, function ($query, $min_price) {
                    return $query->where('price','>=',$min_price);
                })
                ->when($max_price, function ($query, $max_price) {
                    return $query->where('price','<=',$max_price);
                })*/
                ->orderBy('updated_at','desc');

            $data['result'] = $query->paginate(2);
            // print($address);
            // print(count($data['result']));die;
            $data['count'] = count($data['result']);

            // print(count($data['result']));die;
            $res = ['status'=>true ,'data'=>view('web.home.filter_page',$data)->render()];
            return $res;
            
        }
    }
    
    public function properteDetails(Request $request,$id){
        // $id = property id 
        $data['result'] = Property::where('id',$id)->orderBy('created_at','desc')->first();
        $data['images'] = GalleryImage::where('property_id',$id)->get();
        $data['features'] = Features::where('status','Active')->get();

        $pro_features = PropertyFeatures::where(['property_id'=>$id])->get(['feature_id']);
        $data['propertey_features'] = [];
        // To create the property features array
        foreach ($pro_features as $key => $value) {
            $data['propertey_features'][] = $value->feature_id;
        }
        // print_r($data['propertey_features']);die;
        return view('web.home.properte_details',$data);
    }


    public function aboutUs(){

        return view('web.home.about_us');
    }

    public function login(Request $request){

        if($request->isMethod('post')){ //post method

            $validator = Validator::make($request->all(),[
     
                'email'         => 'required',
                'password'      => 'required',
                
            ]); 
            if($validator->fails()){

                return Redirect::to("login")->withInput()->withErrors($validator);
                
            } else {
                $credentials = array(

                    'email'=> $request->email,
                    'password' => $request->password );

                if (auth('user')->attempt($credentials)) {

                    $user = auth('user')->user();
                    if($user->user_type == '2'){ // If user is owner 

                        Session::put(['owner' => $user->id]); 
                        return Redirect::to("owner/dashboard")->withSuccess('You have success fully login.');

                    } elseif($user->user_type == '3'){ // If user is Paying uest
                        Session::put(['pg' => $user->id]);
                        if(session('property_id')) {
                            return Redirect::to("pg/book")->withSuccess('You have success fully login.');    
                        }
                        return Redirect::to("pg/dashboard")->withSuccess('You have success fully login.');
                        
                    } elseif($user->user_type == '1'){ // If user is owner 
                        Session::put(['id' => $user->id]);  
                        # Redirect to dashboard
                        return redirect()->intended('admin/dashboard');
                    }

                } else {
                    return Redirect::to("owner/login")->withFail('Please check credentials.');
                } 

            }

        } else { //get mehtod
            if ($request->session()->exists('id')) { //for admin
                return redirect()->intended('admin/dashboard');
            } elseif($request->session()->exists('owner')){
                return Redirect::to("owner/dashboard");
            } elseif($request->session()->exists('pg')){
                return Redirect::to("pg/dashboard");
            }
            return view('web.home.login');
        }
    }

    /*
*purpose : otp verification for all
*/
    public function otpVerification(Request $request,$user_id){
        
        if ($request->isMethod('post')) {
            // print_r($request->all());die;
            $validation = Validator::make($request->all(),[
            
            'otp'    => 'required|numeric',
            ]);
            
            if ($validation->fails()) {
              return Redirect::to("otp-verification/$user_id")->withErrors($validation)->withInput();
            }else{

                //otp stored in databae
                $data = User::find($user_id);
                //user is registred
                if($data){
                    if($data->verified == 0){
                        $create_DateTime    =  $data->created_at;
                        $create_DateTime    = $create_DateTime->format('Y-m-d H:i:s');
                        $endTime = strtotime("+15 minutes", strtotime($create_DateTime));
                        $expired_DateTime =  date('Y-m-d H:i:s', $endTime);
                        echo $expired_DateTime.'='.date('Y-m-d H:i:s');
                        $diff = abs(strtotime($expired_DateTime)-strtotime($create_DateTime))/60;

                        if(strtotime($expired_DateTime) >= strtotime(date('Y-m-d H:i:s'))){
                        print($diff);die;
                            //check for enter otp is currect or not
                            $otp = $request->otp;
                            if($data->otp == $otp){
                                // echo "databae".$data->otp.'  '.'request'.$otp;
                                $data = array('verified'  => '1');
                                $update = User::where('id',$user_id)->update($data);
                                if($update){
                                    return Redirect::to("login")->withSuccess('You have Successfull Registered.');
                                } else {
                                    return Redirect::to("owner/signup")->withFail('Something went to wrong.');
                                }
                            } else {
                                return Redirect::to("otp-verification/$user_id")->withFail('Something went to wrong.');
                            }

                        } else {
                            // User::where('id',$user_id)->delete();
                            return Redirect::to("login")->withFail('Your session has been expired.');  
                        }
                    } else {
                      return Redirect::to("login")->withSuccess('You have Successfull Registered.');  
                    }
                } else {
                    User::where('id',$user_id)->delete();
                    return Redirect::to("login")->withFail('You session has been expired.');  
                }

            }

        } else {

            $data['user_info'] = User::where('id',$user_id)->first();
            if(!empty($data['user_info']) && $data['user_info']->verified == 1){
                return Redirect::to("login")->withSuccess('You have Successfull Registered.');
            }
            return view('web.home.otp_verification',$data);
            
        }
    }
}
