<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage};
use Validator,Redirect,Session;

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

        $query = Property::query();
        $address = $request->location;

        $data['result'] = $query->where(['p_status'=>'Active'])
              ->orderBy('updated_at','desc')
              ->where('address', "LIKE", "%".$address."%")
              ->paginate(2);
            // print_r($data);die;
        // print(count($data));
        // print_r($data);
        // die;

        return view('web.home.properte_list',$data);
    }
    
    public function properteDetails(Request $request){

        return view('web.home.properte_details');
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
            return view('web.home.login');
        }
    }
}
