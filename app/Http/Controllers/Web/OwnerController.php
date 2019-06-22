<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage};
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
            'email'         => 'required',
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

                $data = array(  'password'  => bcrypt($request->new_password),
                            );
                $upd = User::where('id',$id)->update($data);
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
            // $data = $request->file('image');
            // print_r($data);die;
             $validation = Validator::make($request->all(),[
                'title'    => 'required',
                'price'    => 'required',
                'type'    => 'required',
                'gender'    => 'required',
                'room'      => 'required',
                'share_bed' => 'required',
                'bed'      => 'required',
                'bathroom' => 'required',
                'kitchen'  => 'required',
                'address'  => 'required',
                'image'    => 'required|max:50240',
                'name'     => 'required',
                'email'    => 'required',
                'phone'    => 'required',
            ]);

            if ($validation->fails()) {
              return Redirect::to("owner/submit-property")->withErrors($validation)->withInput();
            }else{
                /*1 Image insert 
                2. then image id insert into propertey
                3.property id insert into featurs tabel*/

                $data = array(  'title'     => $request->title,
                                'status'     => 'For Sale',
                                'price'        => $request->price,
                                'type'        => $request->type,
                                'area'         => $request->area, 
                                'gender'       => $request->gender, 
                                'room'         => $request->room, 
                                'share_bed'    => $request->share_bed, 
                                'bed'         => $request->bed, 
                                'bathroom'     => $request->bathroom, 
                                'kitchen'      => $request->kitchen, 
                                'address'      => $request->address,
                                'state'      => $request->state,
                                'postal_code'  => $request->postal_code, 
                                'description'  => $request->description, 
                                'created_at'    => date('Y-m-d H:i:s'),
                         );
          
                $insert = Property::insertGetId($data);
                if ($insert) {  //if properte insert                
                    //now insert the images GalleryImage
                    // $data = $request->file('image');
                    // print_r($data);die;
                    if ($files = $request->file('image')) {
                        foreach($files as $file){
                            $destinationPath = Config::get('constants.Gallery_Image');
                            $name=rand(11111, 99999) . $file->getClientOriginalName();
                            $file->move($destinationPath,$name);

                            $imageData = array(
                                    'property_id' => $insert, //propertey id
                                    'image' => $name,
                                    'created_at'    => date('Y-m-d H:i:s'),
                                );
                            GalleryImage::insertGetId($imageData);
                        }

                    } //images

                    //Now Insert the Contact Details contact_of_person
                    $contactData = array(
                                'property_id' => $insert, //propertey id
                                'name'=> $request->name,
                                'email'=> $request->email,
                                'phone'=> $request->phone,
                                'created_at'    => date('Y-m-d H:i:s'),
                    );
                    ContactOfPerson::insertGetId($contactData);
                    
                  return Redirect::to("owner/submit-property")->withSuccess('You have Successfull Properte added.');
                }else{
                  return Redirect::to("owner/submit-property")->withFail('Something went to wrong.');
                  }


            }
        
        } else { //get method
            
            $data['title'] = "Submit Property";
            $data['state'] = State::where('status','Active')->get();
            return view('web.owner.dashboard.submit-property',$data);
        }

    }
    public function invoices(Request $request){
    	$data['title'] =  "Invoice";
    	return view('web.owner.dashboard.invoices',$data);
    }

    /*
    *purpose : To show the list of my properties
    */
    public function myProperties(Request $request){

        $data['title'] =  "My Properties";
        $data['property'] = Property::with('imgGallery')->where('p_status','Active')->orderBy('created_at','desc')->get();

        // print_r($data['property'][0]['imgGallery']);die();
        return view('web.owner.dashboard.my_properties',$data);
    }

    public function myPropertiesEdit(Request $request,$id){
        
        $data['title'] =  "My Properties Update";
        
        if($request->isMethod('post')){ //post method

            $validation = Validator::make($request->all(),[
                'title'    => 'required',
                'price'    => 'required',
                'type'    => 'required',
                'gender'    => 'required',
                'room'      => 'required',
                'share_bed' => 'required',
                'bed'      => 'required',
                'bathroom' => 'required',
                'kitchen'  => 'required',
                'address'  => 'required',
                'image'    => 'max:50240',
                'name'     => 'required',
                'email'    => 'required',
                'phone'    => 'required',
            ]);

            if ($validation->fails()) {
              return Redirect::to("owner/my-properties/edit/$id")->withErrors($validation)->withInput();
            }else{

                /*1 Image insert 
                2. then image id insert into propertey
                3.property id insert into featurs tabel*/

                $data = array(  'title'     => $request->title,
                                'status'     => 'For Sale',
                                'price'        => $request->price,
                                'type'        => $request->type,
                                'area'         => $request->area, 
                                'gender'       => $request->gender, 
                                'room'         => $request->room, 
                                'share_bed'    => $request->share_bed, 
                                'bed'         => $request->bed, 
                                'bathroom'     => $request->bathroom, 
                                'kitchen'      => $request->kitchen, 
                                'address'      => $request->address,
                                'state'      => $request->state,
                                'postal_code'  => $request->postal_code, 
                                'description'  => $request->description, 
                           );
          
                $update = Property::where('id',$id)->update($data);
                if ($update) {  //if properte insert                
                    //now insert the images GalleryImage
                    // $data = $request->file('image');
                    // print_r($data);die;
                    /*when all images are updated from beging*/
                    if ($files = $request->file('image')) { 
                        // die('choose');
                        GalleryImage::where('property_id',$id)->delete();
                        foreach($files as $file){
                            $destinationPath = Config::get('constants.Gallery_Image');
                            $name=rand(11111, 99999) . $file->getClientOriginalName();
                            $file->move($destinationPath,$name);

                            $imageData = array(
                                    'property_id' => $id, //propertey id
                                    'image' => $name,
                                    'created_at'    => date('Y-m-d H:i:s'),
                                );
                            GalleryImage::insertGetId($imageData);
                        }

                    }//images insert

                    if ($request->image_edit) { 
                        GalleryImage::where('property_id',$id)->delete();
                        $files =  $request->image_edit;
                        // print_r($files =  $request->image_edit);die;
                        foreach($files as $file){

                            $imageData = array(
                                    'property_id' => $id, //propertey id
                                    'image' => $file,
                                    'created_at'    => date('Y-m-d H:i:s'),
                                );
                            GalleryImage::insertGetId($imageData);
                        }

                    }
                    //Now Insert the Contact Details contact_of_person
                    $contactData = array(
                                'property_id' => $id, //propertey id
                                'name'=> $request->name,
                                'email'=> $request->email,
                                'phone'=> $request->phone,
                    );
                    ContactOfPerson::where('property_id',$id)->update($contactData);
                    
                  return Redirect::to("owner/my-properties")->withSuccess('You have Successfull Properte Updated.');
                }else{
                  return Redirect::to("owner/my-properties/edit/$id")->withFail('Something went to wrong.');
                  }

            }


        } else { //Get method

            $data['property_edit'] = Property::with(['cop'])->where('id',$id)->first();
            $data['image_gallery'] = GalleryImage::where('property_id',$id)->get();
            $data['state'] = State::where('status','Active')->get();
            return view('web.owner.dashboard.my_properties_edit',$data);
        }


    }
    public function PropertyDetails(Request $request){
         $data['title'] =  "Properties Detail";
        return view('web.owner.dashboard.properte_details',$data);
    }

    /*
    * purpose : To delete the property
    */
    public function PropertyDelete(Request $request){

        $property_id = $request->id;
        
        $res['success'] = false;
        $res['msg'] = "Something went to wrong.";
        $delete = Property::where('id',$property_id)->delete();
        
        if($delete){
            $res['success'] = false;
            $res['msg'] = "You have Successfull Properte Updated.";

            $data['property_edit'] = Property::with(['cop'])->where('id',$id)->first();
            $data['image_gallery'] = GalleryImage::where('property_id',$id)->get();
            $data['state'] = State::where('status','Active')->get();
            
            return ['res'=>$res,'data'=>view('web.owner.dashboard.my_properties_edit',$data)] ;
       
       }


    }
}