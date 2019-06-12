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
        $data = $request->location;
        print($data);
        return view('web.home.properte_list');
    }

    public function aboutUs(){

        $data = "vikas";
        return view('web.home.about_us');
    }
}
