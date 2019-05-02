<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard(Request $request){
    	print_r("this oner dashboard ");
    	return view('web.owner.dashboard');

    }
}
