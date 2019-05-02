<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User};
use Validator,Redirect,Session;

class PgController extends Controller
{
    public function dashboard(Request $request){
    	$data['info'] = User::find(Session::get('pg'));
    	return view('web.pg.dashboard.dashboard',$data);
    }

    ///for messages

    public function messages(Request $request){

    	return view('web.pg.dashboard.messages');
    }

    public function myProfile(Request $request){

    	return view('web.pg.dashboard.my_profile');
    }
}
