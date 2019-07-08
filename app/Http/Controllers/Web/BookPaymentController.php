<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty};

use Validator,Redirect,Session,Config,Auth;

class BookPaymentController extends Controller{

	public function book(Request $request){
		$property_id = Session::get('property_id');
		//Session forgot code here
		$data['title'] = 'Book and Payment Page';
		$data['result'] = Property::where('id',$property_id)->orderBy('created_at','desc')->first();
        $data['images'] = GalleryImage::where('property_id',$property_id)->get();
        $data['features'] = Features::where('status','Active')->get();

        return view('web.pg.dashboard.properte_book',$data);
	}

}