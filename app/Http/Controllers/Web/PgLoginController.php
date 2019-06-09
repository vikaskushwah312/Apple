<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User};
use Validator,Redirect,Session;
class PgLoginController extends Controller
{
    public function login(Request $request){
    	if (Session::get('pg')) {
            return Redirect::to("pg/dashboard");
        }
    	return view('web.pg.auth.login');
    }

    //post login for paying guest and owner
    public function postLogin(Request $request){
        $validation = Validator::make($request->all(),[
	        'email' 		=> 'required|email',
	        'password' 		=> 'required|max:20',
	    	]);
        
        if($validation->fails()){
            
            return Redirect::to("pg/login")->withInput()->withErrors($validation);
            
        } else {

    	$credentials = array(

                    'email'=> $request->email,
                    'password' => $request->password,
                        );
        }
        if (auth('user')->attempt($credentials)) {

            $user = auth('user')->user();
            if($user->user_type == '3'){ // If user is Paying uest

                Session::put(['pg' => $user->id]); 
                return Redirect::to("pg/dashboard")->withSuccess('You have success fully login.');
            } else {
                    return Redirect::to("pg/login")->withFail('Please check credentials.');
            }
        } else {
            return Redirect::to("pg/login")->withFail('Please check credentials.');
        }    

    }
    /*
    * Name: signup
    * Create Date: 21 April 2019
    *purpose : Registration for paying guest and owner
    */
    public function signup(Request $request){

    	return view('web.pg.auth.signup');
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

          return Redirect::to("pg/signup")->withErrors($validation)->withInput();

        }else{

        	$data = array(  'first_name'  	=> $request->first_name,
        					'last_name'  	=> $request->last_name,
        					'email'  		=> $request->email,	
        					'password'  	=> bcrypt($request->password),
        					'contact_no' 	=> $request->contact_no,
        					'user_type'		=> 3, // pay guest
        				   	'created_at' 	=> date('Y-m-d H:i:s'),
        				 );

          	$insert = User::insertGetId($data);
            if ($insert) {	            
              return Redirect::to("pg/login")->withSuccess('You have Successfull Registered.');
            }else{
              return Redirect::to("pg/signup")->withFail('Something went to wrong.');
              }
        }

    }

    public function forgotPassword(Request $request){
    	return  view('web.pg.auth.forgot_password');
    }

    public function postForgotPassword(Request $request){

    }

    public function logout(Request $request){
        Session()->flush();
        return redirect('pg/login')->withSuccess('You have Successfull LogOut.');
    }
}
