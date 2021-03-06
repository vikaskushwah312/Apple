<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User};
use Validator,Redirect,Session;
use Notification;
use App\Notifications\Registration;

class OwnerLoginController extends Controller
{
    public function login(Request $request){

        if ($request->session()->exists('id')) { //for admin
            return redirect()->intended('admin/dashboard');
        } elseif($request->session()->exists('owner')){
            return Redirect::to("owner/dashboard");
        } elseif($request->session()->exists('pg')){
            return Redirect::to("pg/dashboard");
        }
    	return view('web.home.login');
    }

    //post login for paying guest and owner
    public function postLogin(Request $request){

        $validator = Validator::make($request->all(),[
     
                'email'         => 'required',
                'password'      => 'required',
                
            ]); 

        if($validator->fails()){
            
            return Redirect::to("owner/login")->withInput()->withErrors($validator);
            
        } else {

    	$credentials = array(

                    'email'=> $request->email,
                    'password' => $request->password );
        }
        if (auth('user')->attempt($credentials)) {

            $user = auth('user')->user();
            if($user->user_type == '2'){ // If user is owner 

                Session::put(['owner' => $user->id]); 
                return Redirect::to("owner/dashboard")->withSuccess('You have success fully login.');
            } else {
                return Redirect::to("owner/login")->withFail('Please check credentials.');
            }
        } else {
            return Redirect::to("owner/login")->withFail('Please check credentials.');
        }    

    }
    /*
    * Name: signup
    * Create Date: 21 April 2019
    *purpose : Registration for paying guest and owner
    */
    public function signup(Request $request){

    	return view('web.owner.auth.signup');
    }

    public function postSignup(Request $request){

    	$validation = Validator::make($request->all(),[
	        
	        'first_name' 	=> 'required|regex:/^[\pL\s\-]+$/u',
            'last_name'     => 'required|regex:/^[\pL\s\-]+$/u',
	        'email' 		=> 'required|email|unique:users|string|max:255',
	        'password' 		=> 'required|max:20',
	        'confirm_Password' => 'required|same:password',
	        'contact_no' 	=> 'required|numeric|digits:10|unique:users',
	    	]);

        if ($validation->fails()) {
          return Redirect::to("owner/signup")->withErrors($validation)->withInput();
        }else{

            $otp = rand(1,9999999);
            
        	$data = array(  'first_name'  	=> $request->first_name,
        					'last_name'  	=> $request->last_name,
        					'email'  		=> $request->email,	
                            'password'      => bcrypt($request->password),
        					'contact_no' 	=> $request->contact_no,
        					'user_type'		=> 2,
                            'otp'           => $otp,
                            'verified'      => "0",
        				   	'created_at' 	=> date('Y-m-d H:i:s'),
        				 );
          	$insert = User::insertGetId($data);

            if ($insert) {
                //send the otp on user email 
                $user = new User();
                $user->email = $request->email;   // This is the email you want to send to.
                $user->opt = $otp;
                $user->notify(new Registration($data));

                return Redirect::to("otp-verification/$insert")->withSuccess('We Have Send The Otp in your Registered Email.');
                

            }else{
              return Redirect::to("owner/signup")->withFail('Something went to wrong.');
            }
        }

    }



    public function forgotPassword(Request $request){
    	return  view('web.owner.auth.forgot_password');
    }

    public function postForgotPassword(Request $request){
        
    }

    public function logout(Request $request){
        Session()->flush();
        Session::flash('message', 'You have Successfull Logged out.'); 
        return Redirect::to("login");
    }
}
