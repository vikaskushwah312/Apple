<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty,Vigit};
use Validator,Redirect,Session;
// *****************************notification ***********
use App\Notifications\Complain;
use App\Models\Notification;
use App\Notifications\ForgotPassword;
use DateTime,DateInterval;


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
                $service_type  = $myValue['service_type'];

                
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
                    ->when($service_type, function ($query, $service_type) {
                        return $query->where('service_type', $service_type);
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
                // print_r($request->service_type);die;
                $address = $request->location;
                $share_bed = $request->share_bed;
                $room = $request->room;
                $type = $request->type;
                $gender = $request->gender;
                $service_type = $request->service_type;

                
                // print($share_bed);die;
                // $query->where(['p_status'=>'Active']);
                  
                $data['result'] = [];
                if($address || $share_bed || $room || $type || $gender ||$service_type){
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
                        ->when($gender, function ($query, $gender) {
                            return $query->where('gender', $gender);
                        })
                        ->when($service_type, function ($query, $service_type) {
                            return $query->where('service_type', $service_type);
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
            $service_type  = $myValue['service_type'];
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
                ->when($service_type, function ($query, $service_type) {
                    return $query->where('service_type', $service_type);
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
        // print_r($data['result']);die();
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

    public function termsConditions(Request $request){
        return view('web.home.terms_conditions');
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
                        
                        //add minutes for expired
                        $minutes_to_add = 15;
                        $time = new DateTime($data->created_at);
                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                        $expired_DateTime = $time->format('Y-m-d H:i:s');

                        $currect_DateTime = date('Y-m-d H:i:s');
                        
                        if(strtotime($currect_DateTime) <= strtotime($expired_DateTime)){
                            
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
                            
                            User::where('id',$user_id)->delete();
                            return Redirect::to("login")->withFail('Your session has been expired.');  
                        }
                    } else {
                      return Redirect::to("login");  
                    }
                } else {
                    User::where('id',$user_id)->delete();
                    return Redirect::to("login")->withFail('You session has been expired.');  
                }

            }

        } else {

            $data['user_info'] = User::where('id',$user_id)->first();
            // print_r($data['user_info']);die;
            if(!empty($data['user_info']) && $data['user_info']->verified == 1){
                return Redirect::to("login")->withSuccess('You have Successfull Registered.');
            }
            if (empty($data['user_info'])) {
                return Redirect::to("login");
            }

            return view('web.home.otp_verification',$data);
            
        }
    }


    //set the forgotpassword
    public function forgotPassword(Request $request){

        if ($request->isMethod('post')) { //post method
            $validation = Validator::make($request->all(),[
            
            'email' => 'required|email|string|max:255',
            ]);
            if ($validation->fails()) {
              return Redirect::to("forgot-password")->withErrors($validation)->withInput();
            }else{

                try{
                    $email = $request->email;
                    $data = User::where('email',$email)->first();
                    if(!empty($data)){
                        $otp = rand(1,9999999);
                        $main['otp'] = $otp;
                        //send mail link/otp
                        $user = new User();
                        $user->email = $email;  // This is the email you want to send to.
                        $user->opt = $otp;
                        $user->notify(new ForgotPassword($main));

                        return view('web.home.forgot_password_update',['info'=>$data]);

                    }else{
                        return Redirect::to("login")->withFail('Email not found ! please Register');  
                    }
                }catch(Exception $e) {
                  echo 'Message: ' .$e->getMessage();
                }
            }
        } else { //get method
            return view('web.home.forgot_password');
        }
        
    }

    public function postForgotPassword(Request $request){
        
        if($request->isMethod('post')){

            $validation = Validator::make($request->all(),[
            'otp' => 'required',
            ]);
            if ($validation->fails()) {
              return Redirect::to("post-forgot-password")->withErrors($validation)->withInput();
            }else{

                $email = $request->email;
                $otp = $request->otp;
                $data = user::where(['email'=>$email,'otp'=>$otp])->first();
                //add minutes for expired

                $minutes_to_add = 15;
                $time = new DateTime($data->updated_at);
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                $expired_DateTime = $time->format('Y-m-d H:i:s');

                $currect_DateTime = date('Y-m-d H:i:s');
                
                if(strtotime($currect_DateTime) <= strtotime($expired_DateTime)){
                    Session::put('forgot_id',$data->id);
                    return Redirect::to("change-password")->withSuccess('Please Chnage your password.');
                }
                return Redirect::to("forgot-password")->withFail('You session has been expired.');


            }
        } else {
            
        }

    }

    public function changePassword(Request $request){

        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(),[
            'new_password'    => 'required|min:6|max:20',
            'confirm_password' => 'required|same:new_password|min:6|max:20',
            ]);

            if ($validation->fails()) {
              return Redirect::to("change-password")->withErrors($validation)->withInput();
            }else{

                $data = array(  'password'  => bcrypt($request->new_password),
                            );
                $id = Session::get('forgot_id');
                $upd = User::where('id',$id)->update($data);
                if ($upd) {
                    $request->session()->forget('forgot_id');
                    return Redirect::to("login")->withSuccess('Password Successfull Updated.');
                }else{
                  return Redirect::to("change-password")->withFail('Something went to wrong.');
                }

            }
        } else {
            return view('web.home.change_password');
        }
    }

    /*
    * purpose : to crate the vigiter recoreds in database in for owner and admin
    */

    public function vigit(Request $request,$property_id){

            $id = auth('user')->id();
            $data['info'] = User::where(['id'=>$id,'user_type'=>3])->first();
            $data['property_id'] =$property_id;
            return view('web.home.vigit',$data);
        

    }
    public function submitVigit(Request $request){
        try{
            $validation = Validator::make($request->all(),[
            
            'first_name'    => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'email'         => 'required|email|string|max:255',
            'contact'       => 'required|numeric|digits:10',
            ]);

            if ($validation->fails()) {
        
              return Redirect::to("vigit")->withErrors($validation)->withInput();
            }else{
                $vigit = new Vigit();
                $input = $request->only($vigit->getfillable());
                $input['vigit_done'] = 0;
                if($request->session()->exists('pg')){
                    $input['user_id'] = auth('user')->id();
                }
                $insert = Vigit::insertGetId($input);
                if ($insert) {
                return Redirect::to("/")->withSuccess('we will contact in 24 hours.');
                }else{
                  return Redirect::to("vigit")->withFail('Something went to wrong.');
                }
            }
            

        }catch(Exception $e){
            echo "Message".$e->getMessage();
        }
    }
}
