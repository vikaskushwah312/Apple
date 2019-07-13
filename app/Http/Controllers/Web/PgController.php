<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Complain};
use Validator,Redirect,Session,Config,Auth;

class PgController extends Controller
{
    public function dashboard(Request $request){
    	$data['info'] = User::find(Session::get('pg'));
        $data['title'] = '';
    	return view('web.pg.dashboard.dashboard',$data);
    }

    ///for messages

    public function messages(Request $request){
        $data['title'] = 'Messages';
    	return view('web.pg.dashboard.messages',$data);
    }

    /*
    *purpose : Get all invoices
    */
    public function invoices(Request $request){

        if($request->isMethod('post')){

        } else {
            
            $data['title'] = 'Invoices';
            return view('web.pg.dashboard.invoices',$data);

        }
    }

    
    public function myProfile(Request $request){
        // print(Session::get('pg'));die;
        $id = Session::get('pg');
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(),[
            
            'first_name'    => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'contact_no'    => 'required|numeric|digits:10|unique:users,contact_no,'.$id,
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validation->fails()) {
              return Redirect::to("pg/my-profile")->withErrors($validation)->withInput();
            }else{

                $data = array(  'first_name'    => $request->first_name,
                                'last_name'     => $request->last_name,
                                'contact_no'    => $request->contact_no,
                             );
                
                if ($files = $request->file('image')) {
                    
                    $destinationPath = Config::get('constants.PROFILE_IMAGE'); // upload path
                    $profileImage = rand(11111, 99999) . $files->getClientOriginalName(); // getting image
                    $files->move($destinationPath, $profileImage);
                    $data['image'] = $profileImage;
                }

                $update = User::where('id',$id)->update($data);

                if ($update) {              
                  return Redirect::to("pg/my-profile")->withSuccess('You have Successfull Updated.');
                }else{
                  return Redirect::to("pg/my-profile")->withFail('Something went to wrong.');
                  }
            }
        } else{
            $data['title'] = "My Profile";
            $data['info'] = User::find(Session::get('pg')); // pg_id(user id) = Session::get('pg') 
            return view('web.pg.dashboard.my_profile',$data);
        }
    }

    /*
    *purpose: change the password for owner 
    */
    public function changePassword(Request $request){
        $id = auth('user')->user()->id;
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(),[
            'new_password'    => 'required|min:6|max:20',
            'confirm_password'     => 'required|same:new_password|min:6|max:20',
            ]);

            if ($validation->fails()) {
              return Redirect::to("pg/change-password")->withErrors($validation)->withInput();
            }else{

                $data = array(  'password'  => bcrypt($request->new_password),
                            );
                $upd = User::where('id',$id)->update($data);
                if ($upd) {      
                  return Redirect::to("pg/dashboard")->withSuccess('Password Successfull Updated.');
                }else{
                  return Redirect::to("pg/change-password")->withFail('Something went to wrong.');
                  }
            }

        } else {
            $data['title'] = "Change Password";
            return view('web.pg.dashboard.change_password',$data);
        }
    }

    /*
    * purpose : for user complains
    */
    public function complain(Request $request,$property_id){
        if($request->isMethod('post')){

            $validation = Validator::make($request->all(),[
            'complain'    => 'required',
            'subject'    => 'required',
            ]);

            if ($validation->fails()) {
              return Redirect::to("pg/complain")->withErrors($validation)->withInput();
            }else{

                $data = array(  'complain'  => $request->complain,
                                'property_id'  => $request->property_id,
                                'user_id'  => auth('user')->user()->id,
                                'subject'   => $request->subject,
                                'created_at' => date('Y-m-d H:s:i')
                             );
                $insert = Complain::insertGetId($data);
                
                if ($insert) {              
                  return Redirect::to("pg/booked-list")->withSuccess('You have successfully complain');
                }else{
                  return Redirect::to("pg/booked-list")->withFail('Something went to wrong.');
                }

            }

        } else {
            
            $data['title'] = 'Complain';
            $data['info'] = User::find(Session::get('pg'));
            $data['property_id'] = $property_id;

            return view('web.pg.complain.complain',$data);

        }
    }
    /*
    *purpose : edit the complain 
    */
    public function complainedit(Request $request,$complain_id){

        if ($request->isMethod('post')) {
            
            $validation = Validator::make($request->all(),[
            'complain'    => 'required',
            'subject'    => 'required',
            ]);

            if ($validation->fails()) {
              return Redirect::to("pg/complain")->withErrors($validation)->withInput();
            }else{

                $data = array(  'complain'  => $request->complain,
                                'subject'  => $request->subject,
                             );
                $update = Complain::where('id',$complain_id)->update($data);
            }
            if ($update) {              
              return Redirect::to("pg/complain-list")->withSuccess('You have successfully complain update');
            }else{
              return Redirect::to("pg/complain-list")->withFail('Something went to wrong.');
            }

        } else { //get method

            $data['title'] = 'Complain Edit';
            $data['complain'] =Complain::where('id',$complain_id)->first();
            return view('web.pg.complain.complain_edit',$data);
        }

    }

    //get the all complain list those complain by usered 
    public function complainList(Request $request){

        $data['title'] = 'Complain List';
        $fields = array('complain.*','property.title','property.address','property.price');
        $data['property'] = Complain::where(['user_id'=>auth('user')->id()])
                            ->leftjoin('property','complain.property_id','=','property.id')
                            ->orderBy('complain.created_at','desc')
                            ->get($fields);

        return view('web.pg.complain.complain_list',$data);

    }
    public function complainDelete(Request $request){
        
        if($request->ajax()){

            $complain_id = $request->id;
            $res['success'] = false;
           
            $delete = Complain::where('id',$complain_id)->delete();
            
            if($delete){
                $res['success'] = true;
            }

            return $res ;
        }
    }
}
