<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    //This is for Home page
    public function home(Request $request){

    // return view('layouts.index');
    	// return view('layouts.home');
    	return view('layouts.master');
    }
}
