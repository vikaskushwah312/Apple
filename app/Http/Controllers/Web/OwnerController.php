<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User};
use Validator,Redirect,Session,URL,Config;

class OwnerController extends Controller
{   
    public function dashboard(Request $request){
        $data['title'] = "";
    	$data['info'] = User::find(Session::get('owner'));
    	return view('web.owner.dashboard.dashboard',$data);
    }

    public function messages(Request $request){
        $data['title'] = "";
    	return view('web.owner.dashboard.messages',$data);
    }

    public function myProfile(Request $request){
        // print(Session::get('owner'));die;
        $id = Session::get('owner');
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(),[
            
            'first_name'    => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'contact_no'    => 'required|numeric|digits:10|unique:users,contact_no,'.$id,
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validation->fails()) {
              return Redirect::to("owner/my-profile")->withErrors($validation)->withInput();
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
                  return Redirect::to("owner/my-profile")->withSuccess('You have Successfull Updated.');
                }else{
                  return Redirect::to("owner/my-profile")->withFail('Something went to wrong.');
                  }
            }
        } else{
            $data['title'] = "My Profile";
            $data['info'] = User::find(Session::get('owner')); // owner_id(user id) = Session::get('owner') 
        	return view('web.owner.dashboard.my_profile',$data);
        }
    }

    /*
    *purpose: change the password for owner 
    */
    public function changePassword(Request $request){
        $id = Session::get('owner');
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(),[
            'new_password'    => 'required|min:6|max:20',
            'confirm_password'     => 'required|same:new_password|min:6|max:20',
            ]);

            if ($validation->fails()) {
              return Redirect::to("owner/change-password")->withErrors($validation)->withInput();
            }else{

                $data = array(  'password'  => bcrypt($request->password),
                            );
                $upd = User::where($id)->update($data);
                if ($upd) {              
                  return Redirect::to("owner/dashboard")->withSuccess('Password Successfull Updated.');
                }else{
                  return Redirect::to("owner/change-password")->withFail('Something went to wrong.');
                  }
            }

        } else {
            $data['title'] = "Change Password";
            return view('web.owner.dashboard.change_password',$data);
        }
    }

    public function submitProperty(Request $request){

        if ($request->isMethod('post')) {
            echo "string";
            $data = $request->file('image');
            print_r($data);die;
        } else {
            
            $data['title'] = "Submit Property";
            return view('web.owner.dashboard.submit-property',$data);
        }

    }
    public function invoices(Request $request){
    	$data['title'] =  "Invoice";
    	return view('web.owner.dashboard.invoices',$data);
    }
}