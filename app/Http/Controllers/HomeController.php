<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty};
use Validator,Redirect,Session;

class HomeController extends Controller
{
    
    //This is for Home page
    public function home(Request $request){
        
    // return view('layouts.index');
        $data['result'] = FeaturedProperty::where('featured_property.status','Active')
                                            ->leftjoin('property','featured_property.property_id','=','property.id')
                                            ->get(['property.*']);
        $data['count'] =count($data['result']);

        // total property for rent
        $data['property'] = Property::where('p_status','Active')->count();
        $data['owner'] = User::where(['status'=>'Active','user_type'=>2])->count();
        $data['customer'] = User::where(['status'=>'Active','user_type'=>3])->count();
        // print_r($data['result']);die;
        // print_r($data['count']);die;
        return view('layouts.home',$data);
        // return view('layouts.master');
    }
    public function homeFilter(Request $request){

        try{
            if($request->ajax()){

                $query = Property::query();
                $box = $request->all();        
                $myValue=  array();
                parse_str($box['formvalue'], $myValue);
                $address   = $myValue['location']; 
                $share_bed = $myValue['share_bed'];
                $room      = $myValue['rooms'];
                $type      = $myValue['type'];
                $bathroom  = $myValue['bathroom'];
                // $min_area  = $myValue['min_area']; //area
                // $max_area  = $myValue['max_area'];
                // $min_price = $myValue['min_price'];
                // $max_price = $myValue['max_price'];

                
                $query = Property::query();    
                if($address != ''){
                    $query->where('address', "LIKE", "%".$address."%");
                }
                $query->when($share_bed, function ($query, $share_bed) {
                        return $query->where('share_bed', $share_bed);
                    })
                    ->when($room, function ($query, $room) {
                            return $query->where('room', $room);
                    })
                    ->when($type, function ($query, $type) { //ac /non-ac
                        return $query->where('type', $type);
                    })
                    ->when($bathroom, function ($query, $bathroom) {
                        return $query->where('bathroom', $bathroom);
                    })
                /*    ->when($min_area, function ($query, $min_area) {
                        return $query->where('area','>=',$min_area);
                    })
                    ->when($max_area, function ($query, $max_area) {
                        return $query->where('area','<=',$max_area);
                    })
                   ->when($min_price, function ($query, $min_price) {
                        return $query->where('price','>=',$min_price);
                    })
                    ->when($max_price, function ($query, $max_price) {
                        return $query->where('price','<=',$max_price);
                    })*/
                    ->orderBy('updated_at','desc');

                $data['result'] = $query->paginate(2);
                // print($address);
                // print(count($data['result']));die;
                $data['count'] = count($data['result']);

                // print(count($data['result']));die;
                $res = ['status'=>true ,'data'=>view('web.home.filter_page',$data)->render()];
                return $res;
              
            } else {

                $address = $request->location;
                $share_bed = $request->share_bed;
                $room = $request->room;
                $type = $request->type;
                // print($share_bed);die;
                // $query->where(['p_status'=>'Active']);
                  
                $data['result'] = [];
                if($address || $share_bed || $room || $type){
                    $query = Property::query();    
                        if($address != ''){
                            $query->where('address', "LIKE", "%".$address."%");
                        }
                $query->when($share_bed, function ($query, $share_bed) {
                            return $query->where('share_bed', $share_bed);
                        })
                        ->when($room, function ($query, $room) {
                                return $query->where('room', $room);
                        })
                        ->when($type, function ($query, $type) {
                            return $query->where('type', $type);
                        })
                        ->orderBy('updated_at','desc');

                $data['result'] = $query->paginate(2);
                }
                /*if($request->page){
                    print($request->page);
                }
                print_r($request->all());die;*/
                
                $data['count'] = count($data['result']);
                // print_r(count($data['result']));die;
                // print(count($data));
                // print_r($data);
                // die;
                $data['address']    = $address;
                $data['share_bed']  = $share_bed;
                $data['room']       = $room;
                $data['type']       = $type;
                return view('web.home.properte_list',$data);
            }
        
        }catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
    }
    public function advanceSearch(Request $request){
        if($request->ajax()){
            
            $query = Property::query();
            $box = $request->all();        
            $myValue=  array();
            parse_str($box['formvalue'], $myValue);
            $address   = $myValue['location']; 
            $share_bed = $myValue['share_bed'];
            $room      = $myValue['rooms'];
            $type      = $myValue['type'];
            $bathroom  = $myValue['bathroom'];
            // $min_area  = $myValue['min_area']; //area
            // $max_area  = $myValue['max_area'];
            // $min_price = $myValue['min_price'];
            // $max_price = $myValue['max_price'];

            
            $query = Property::query();    
            if($address != ''){
                $query->where('address', "LIKE", "%".$address."%");
            }
            $query->when($share_bed, function ($query, $share_bed) {
                    return $query->where('share_bed', $share_bed);
                })
                ->when($room, function ($query, $room) {
                        return $query->where('room', $room);
                })
                ->when($type, function ($query, $type) { //ac /non-ac
                    return $query->where('type', $type);
                })
                ->when($bathroom, function ($query, $bathroom) {
                    return $query->where('bathroom', $bathroom);
                })
            /*    ->when($min_area, function ($query, $min_area) {
                    return $query->where('area','>=',$min_area);
                })
                ->when($max_area, function ($query, $max_area) {
                    return $query->where('area','<=',$max_area);
                })
               ->when($min_price, function ($query, $min_price) {
                    return $query->where('price','>=',$min_price);
                })
                ->when($max_price, function ($query, $max_price) {
                    return $query->where('price','<=',$max_price);
                })*/
                ->orderBy('updated_at','desc');

            $data['result'] = $query->paginate(2);
            // print($address);
            // print(count($data['result']));die;
            $data['count'] = count($data['result']);

            // print(count($data['result']));die;
            $res = ['status'=>true ,'data'=>view('web.home.filter_page',$data)->render()];
            return $res;
            
        }
    }
    /*
    *function : advance Search partial
    */
   /* public function advanceSearch(Request $request){
        try {
            if($request->ajax()){
                $data['count'] = 2;
                $data['address'] = 2;
                $res = ['status'=>true,'data'=>view('web.home.advance_search',$data)->render()];
                return $res;
            }
        }catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }
    }*//**/
    public function properteDetails(Request $request,$id){
        // $id property id 
        $data['result'] = Property::where('id',$id)->orderBy('created_at','desc')->first();
        $data['images'] = GalleryImage::where('property_id',$id)->get();
        $data['features'] = Features::where('status','Active')->get();

        $pro_features = PropertyFeatures::where(['property_id'=>$id])->get(['feature_id']);
        $data['propertey_features'] = [];
        // To create the property features array
        foreach ($pro_features as $key => $value) {
            $data['propertey_features'][] = $value->feature_id;
        }
        // print_r($data['propertey_features']);die;
        return view('web.home.properte_details',$data);
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
