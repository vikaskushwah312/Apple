<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Complain,Payment,ComplainReply,Book,Notice,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty,Vigit};
use Validator,Redirect,Session,Config,Auth;


class PgController extends Controller
{
    public function dashboard(Request $request){
    	$data['info'] = User::find(Session::get('pg'));
        $data['title'] = '';
        return Redirect::to("pg/booked-list");
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
// $where = ['user_id'=>auth('user')->id(),'status'=>'success'];
// $data['invoices'] = Payment::where($where)->get();
        if($request->ajax()){

            $query = Payment::query();
            
            $draw   = intval($request->get("draw"));
            $start  = intval($request->get("start"));
            $length = intval($request->get("length"));

            if ($request->get('search')['value'] != "") {

                $value = $request->get('search')['value'];
                
                $query->where('order_id',"LIKE","%$value%");
            }
                //Order
                $orderByField = "payment.id";
                $orderBy = 'desc';

            if (isset($request->get('order')[0]['dir']) && $request->get('order')[0]['dir'] != "") {                        
                $orderBy = $request->get('order')[0]['dir'];
            }

            if (isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] != "") {

            if ($request->get('order')[0]['column'] == 0) {
                          
                $orderByField = "payment.id";
                      
            }else if($request->get('order')[0]['column'] == 1){

                $orderByField = "payment.order_id";             
            }
            
            }

            $total = $query->count();
              
            $info = $query->orderBy($orderByField,$orderBy)->skip($start)->take($length)->get(); 
            // print_r($info);die;
            $data = array();
            $sno = $start;
                
            foreach ($info as $country) {
              $make = $country->status == "Active" ? 'Inactive' : 'Active'; 

              $statusUrl = URL::to('admin/status_activity',[$country->id, $make, 'country']);

              $status = '<a type="" class="change_status" data-title="Confirmation" style="text-decoration: none;" href="'.$statusUrl.'" title="Make '.$make. '" data-make="'.$make.'"><i class="'.($country->status == "Active" ? 'fa fa-lock' : 'fa fa-unlock').'"></i>  Make '.$make.'</a>';
            
              $showStatus = '<span class = "badge '. ($country->status == "Active" ? "bg-green" : "bg-red").'">'.ucfirst($country->status).'</span>'; 
            
              $delet_Url = "'admin/delete_activity/$country->id/country','$country->id'";

              $deleteUrl = '<a type="" class="recorddelete" style="text-decoration: none;" data-title ="Confirmation" data-placement = "top" title="Delete Record" onclick="remove_record('.$delet_Url.')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete Country</a>'; $delet_Url="delete()";
            
              $editUrl = URL::to('admin/edit-country',[$country->id]);  
              //edit url       
            
              $edit_url = '<a type="" class="" style="text-decoration: none;" data-title ="Edit Country" title="edit-country" href="'.$editUrl.'"><i class="fa fa-edit"></i>Edit Country</a>';
            
              $viewstateUrl = URL::to('admin/state-list',[$country->id]);
              $view_state = '<a type="" class="data-title" ="View State" title="edit-state" href="'.$viewstateUrl.'"><i class="fa fa-street-view"></i> View States</a>';
                    $data[] =array(
                      $sno = $sno+1,
                        ucfirst($country->name),
                        $showStatus,
                  '<div class="">
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li>'.$status.'</li>
                                <li>'.$edit_url.'</li>
                                <li>'.$view_state.'</li>
                              </ul>
                            </div>
                          </div>'
                    ); 
                  }/*foreach*/ //<li>'.$deleteUrl.'</li>

                $output = array(
                              "draw"            => $draw,
                              "recordsTotal"    => $total,
                              "recordsFiltered"  => $total,
                              "data"             => $data
                            );
                echo json_encode($output);
                exit();

        } else { //get method
            
            $data['title'] = 'Invoices';
            $where = ['user_id'=>auth('user')->id(),'status'=>'success'];
            $data['invoices'] = Payment::where($where)->get();
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
        $data['complian_reply'] = ComplainReply::pluck('complain_id')->toArray();

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

    //notice period for customer
    public function notice(Request $request){
        $data['title'] = "Notice Period";
        $data['property'] = Book::where(['p_status'=>'Active','user_id'=>auth('user')->id()])
                            ->leftjoin('property','book.property_id','=','property.id')
                            ->orderBy('book.created_at','desc')
                            ->first(['book.*','property.*']);
        if(!empty($data['property'])){

            $data['notice'] = Notice::where(['property_id'=>$data['property']->property_id,'user_id'=>auth('user')->id()])->first();
        } else{
            return Redirect::to("pg/dashboard")->withSuccess('First Book Any Property.');
        }
        return view('web.pg.notice.notice',$data);
        
    }

    public function postNotice(Request $request){
         $validation = Validator::make($request->all(),[
            'subject'    => 'required',
            'notice'    => 'required',
        ]);

        if ($validation->fails()) {
          return Redirect::to("pg/notice")->withErrors($validation)->withInput();
        }else{
            $insert = '';
            $update = '';
            $data = array(  
                            'property_id'   => $request->property_id,
                            'user_id'       => auth('user')->id(),
                            'subject'       => $request->subject,
                            'notice'        => $request->notice,
                         );
            $notice_ins = Notice::where(['property_id'=>$request->property_id,'user_id'=>auth('user')->id()])->first();
            if(empty($notice_ins)){
                $data['created_at']     = date('Y-m-d H:i:s');
                $insert = Notice::insertGetId($data);
            } else {

                $update = Notice::where(['property_id'=>$request->property_id,'user_id'=>auth('user')->id()])->update($data);
            }
           
        }
        if ($insert) {
            return Redirect::to("pg/dashboard")->withSuccess('You have successfully add Notice');
        }
        elseif($update) {              
          return Redirect::to("pg/dashboard")->withSuccess('You have successfully updated Notice');
        }else{
          return Redirect::to("pg/notice")->withFail('Something went to wrong.');
        }
    }

    public function noticeCancel(Request $request,$id){ // notice.id

        $delete = Notice::where('id',$id)->delete();
        if($delete) {              
          return Redirect::to("pg/dashboard")->withSuccess('Your notice period successfully canceled');
        }else{
          return Redirect::to("pg/notice")->withFail('Something went to wrong.');
        }
    }

    public function proDetails(Request $request,$id){

        $data['title'] = '';
        // $id = property id 
        $data['result'] = Property::where('id',$id)->orderBy('created_at','desc')->first();
        // print_r($data['result']);die();
        $data['images'] = GalleryImage::where('property_id',$id)->get();
        $data['features'] = Features::where('status','Active')->get();

        $pro_features = PropertyFeatures::where(['property_id'=>$id])->get(['feature_id']);
        $data['propertey_features'] = [];
        // To create the property features array
        foreach ($pro_features as $key => $value) {
            $data['propertey_features'][] = $value->feature_id;
        }
        // print_r($data['propertey_features']);die;
        return view('web.pg.dashboard.properte_details',$data);
    }
}
