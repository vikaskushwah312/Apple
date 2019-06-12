<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    //This is for Home page
    public function home(Request $request){
        // die("vikas");die
    // return view('layouts.index');
        return view('layouts.home');
        // return view('layouts.master');
    }
    public function homeFilter(Request $request){
        return view('web.home.properte_list');
    }
    
    public function properteDetails(Request $request){

        return view('web.home.properte_details');
    }


    public function aboutUs(){

        return view('web.home.about_us');
    }
}
