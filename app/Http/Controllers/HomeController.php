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
        $share_bed = $request->share_bed;
        $room = $request->room;
        $type = $request->type;
        // print($request->location);
        $data['result'] = $query->where(['p_status'=>'Active'])
                                  ->orderBy('updated_at','desc')
                             ->where('address', "LIKE", "%".$address."%")
                           /* ->when($share_bed != '', function ($query, $share_bed) {
                                    return $query->where('share_bed', $share_bed);
                                })
                            ->when($room != '', function ($query, $room) {
                                    return $query->where('room', $room);
                                })
                            ->when($type != '', function ($query, $type) {
                                    return $query->where('type', $type);
                                })*/
                            ->paginate(2);
        
        $data['count'] = count($data['result']);
        // print_r(count($data['result']));die;
        // print(count($data));
        // print_r($data);
        // die;

        return view('web.home.properte_list',$data);
    }
    public function searchFilter(Request $request){
        if($request->ajax()){
            
            $query = Property::query();
            $box = $request->all();        
            $myValue=  array();
            parse_str($box['formvalue'], $myValue);
            // print_r($myValue);die;
            $address   = $myValue['location']; 
            $share_bed = $myValue['share_bed'];
            $room      = $myValue['rooms'];
            $type      = $myValue['type'];
            $bathroom  = $myValue['bathroom'];
            $min_area  = $myValue['min_area']; //area
            $max_area  = $myValue['max_area'];
            $min_price = $myValue['min_price'];
            $max_price = $myValue['max_price'];


            $data['result'] = $query->where(['p_status'=>'Active'])
                                    ->orderBy('updated_at','desc')
                                    ->when($address != '', function ($query, $address) {
                                            return $query->where('address', "LIKE", "%".$address."%");
                                        })
                                    /*->when($share_bed != '', function ($query, $share_bed) {
                                            return $query->where('share_bed', $share_bed);
                                        })
                                    ->when($room != '', function ($query, $room) {
                                            return $query->where('room', $room);
                                        })
                                    ->when($type != '', function ($query, $type) {
                                            return $query->where('type', $type);
                                        })*/
                                    /*->where('area', '=>', $min_area)
                                    ->orWhere('area','=<', $max_area)
                                    ->where('price', '=>', $min_price)
                                    ->orWhere('price','=<', $max_price)*/
                                    ->paginate(2);
            print($address);
            print(count($data['result']));die;
            $data['count'] = count($data['result']);

            // print(count($data['result']));die;
            $res = ['status'=>true ,'data'=>view('web.home.filter_page',$data)->render()];
            return $res;
            
        }
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
