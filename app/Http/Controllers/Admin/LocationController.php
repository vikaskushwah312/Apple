<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Country,State,City};
use URL,Validator,Redirect,Response;

class LocationController extends Controller
{
    public function country(Request $request){
    	$data['title'] = "Country List";
    	return view('admin.country.list',$data);
    }

    public function countryList(Request $request){
    
    	if($request->ajax()){
		    $query = Country::query();
		    
		    $draw   = intval($request->get("draw"));
		    $start  = intval($request->get("start"));
		    $length = intval($request->get("length"));

		    if ($request->get('search')['value'] != "") {

		        $value = $request->get('search')['value'];
		        
		        $query->where('name',"LIKE","%$value%");
		    }
		        //Order
		        $orderByField = "countries.id";
		        $orderBy = 'desc';

		    if (isset($request->get('order')[0]['dir']) && $request->get('order')[0]['dir'] != "") {                        
		        $orderBy = $request->get('order')[0]['dir'];
		    }

		    if (isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] != "") {

		    if ($request->get('order')[0]['column'] == 0) {
		                  
		        $orderByField = "countries.id";
		              
		    }else if($request->get('order')[0]['column'] == 1){

		        $orderByField = "countries.name";             
		    }
		    
		    }

		    $total = $query->count();
		      
		    $info = $query->orderBy($orderByField,$orderBy)->skip($start)->take($length)->get(); 
		          
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
		} else {
			return "Invalid Request";
		}    

  	}/*country List Data End*/	



  	public function addCountry(Request $request){

  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        
	        'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:countries']);

	        if ($validation->fails()) {
	          
	          return Redirect::to("admin/add-country")->withErrors($validation)->withInput();
	          
	        }else{

	        	$data = array( 'name'  => $request->name,
	        				   'created_at' => date('Y-m-d H:i:s'),
	        				 );
	          
	          	$insert = Country::insertGetId($data);
	          
	            if ($insert) {	            
	              return Redirect::to("admin/country")->withSuccess('Data Successfull add.');
	            }else{
	              return Redirect::to("admin/add-country")->withFail('Something went to wrong.');
	              }
	          }

  		} else {
  			$data['heading'] = "Country";
  			$data['title'] = "Add Country";
  			return view('admin.country.add',$data);
  		}
  	}

  	public function editCountry(Request $request,$id){

  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        
	        'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:countries,name,'.$request->id]);

	        if ($validation->fails()) {
	          return Redirect::to("admin/edit-country/$id")->withErrors($validation)->withInput();
	        }else{

	        	$data = array( 'name'  => $request->name,);
	          	$update = Country::where('id',$id)->update($data);
	          
	            if ($update) {	            
	              return Redirect::to("admin/country")->withSuccess('Country Successfull Updated.');
	            }else{
	              return Redirect::to("admin/edit-country/$id")->withFail('Something went to wrong.');
	              }
	          }
  			
  		} else {

  			$data['heading'] = 'Country';
  			$data['title'] 	 = 'Edit Country';
  			$data['info'] 	 = Country::find($id);
  			return view('admin.country.edit',$data);
  		}
  	}


  	/************ STATE **************************/
    
    public function state(Request $request){
    	$data['title'] = "State List";
    	return view('admin.state.list',$data);
    }

    public function stateList(Request $request){
    
    	if($request->ajax()){
		    $query = State::query();
		    
		    $draw   = intval($request->get("draw"));
		    $start  = intval($request->get("start"));
		    $length = intval($request->get("length"));

		    if ($request['search']['value'] != "") {

                $value = $request['search']['value'];

                $query->where(function ($query) use($value) {
                    $query->where('state_name', "LIKE", "%$value%")
                            ->orWhere('countries.name', "LIKE", "%$value%");
                });
            }

		        //Order
		        $orderByField = "states.id";
		        $orderBy = 'desc';

		    if (isset($request->get('order')[0]['dir']) && $request->get('order')[0]['dir'] != "") {                        
		        $orderBy = $request->get('order')[0]['dir'];
		    }

		    if (isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] != "") {

		    if ($request->get('order')[0]['column'] == 0) {
		                  
		        $orderByField = "states.id";
		              
		    }else if($request->get('order')[0]['column'] == 1){

		        $orderByField = "states.state_name";             
		    }
		    
		    }

		    $where = array();
		    $field = array('states.*','countries.name as country_name');
            $query->where($where);

            $query->leftjoin('countries','countries.id','=','states.country_id');

		    $total = $query->count();
		      
		    $info = $query->orderBy($orderByField,$orderBy)->skip($start)->take($length)->get($field); 
		    // print_r($info) ;die;
		    $data = array();
		    $sno = $start;
		    
		    foreach ($info as $state) {
		      $make = $state->status == "Active" ? 'Inactive' : 'Active'; 

		      $statusUrl = URL::to('admin/status_activity',[$state->id, $make, 'state']);

		      $status = '<a type="" class="change_status" data-title="Confirmation" style="text-decoration: none;" href="'.$statusUrl.'" title="Make '.$make. '" data-make="'.$make.'"><i class="'.($state->status == "Active" ? 'fa fa-lock' : 'fa fa-unlock').'"></i>  Make '.$make.'</a>';
		    
		      $showStatus = '<span class = "badge '. ($state->status == "Active" ? "bg-green" : "bg-red").'">'.ucfirst($state->status).'</span>'; 
		    
		      $delet_Url = "'admin/delete_activity/$state->id/state','$state->id'";

		      $deleteUrl = '<a type="" class="recorddelete" style="text-decoration: none;" data-title ="Confirmation" data-placement = "top" title="Delete Record" onclick="remove_record('.$delet_Url.')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete state</a>'; $delet_Url="delete()";
		    
		      $editUrl = URL::to('admin/edit-state',[$state->id]);  
		      //edit url       
		    
		      $edit_url = '<a type="" class="" style="text-decoration: none;" data-title ="Edit state" title="edit-state" href="'.$editUrl.'"><i class="fa fa-edit"></i>Edit state</a>';
		    
		      $viewstateUrl = URL::to('admin/state-list',[$state->id]);
		      $view_state = '<a type="" class="data-title" ="View State" title="edit-state" href="'.$viewstateUrl.'"><i class="fa fa-street-view"></i> View States</a>';
		            $data[] =array(
		              $sno = $sno+1,
		              ucfirst($state->country_name),
		              ucfirst($state->state_name),
		                $showStatus,
		          '<div class="">
		                    <div class="btn-group">
		                      <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
		                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
		                        <li>'.$status.'</li>
		                        <li>'.$edit_url.'</li>
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
		} else {
			return "Invalid Request";
		}    

  	}/*state List Data End*/

  	public function addState(Request $request){
  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        
	        'country_name'=> 'required',
	        'state_name' => 'required|regex:/^[\pL\s\-]+$/u|unique:states']);

	        if ($validation->fails()) {
	          
	          return Redirect::to("admin/add-state")->withErrors($validation)->withInput();
	          
	        }else{
	        	$data = array( 'country_id'  => $request->country_name,
	        				   'state_name'  => $request->state_name,
	        				   'status'		 => 'Active',
	        				   'created_at' => date('Y-m-d H:i:s'),
	        				 );
	          
	          	$insert = State::insertGetId($data);
	          
	            if ($insert) {	            
	              return Redirect::to("admin/state")->withSuccess('Data Successfull add.');
	            }else{
	              return Redirect::to("admin/add-state")->withFail('Something went to wrong.');
	              }
	          }

  		} else {
  			$data['heading'] = "State";
  			$data['title'] = "Add State";
  			$data['country'] = Country::get();
  			return view('admin.state.add',$data);
  		}
  	}

  	public function editState(Request $request,$id){

  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        
	        'country_name'=> 'required',
	        'state_name' => 'required|regex:/^[\pL\s\-]+$/u|unique:states,state_name,'.$request->id]);

	        if ($validation->fails()) {
	          return Redirect::to("admin/edit-state/$id")->withErrors($validation)->withInput();
	        }else{

	        	$data = array( 'country_id'  => $request->country_name,
	        				   'state_name'  => $request->state_name,
	        				 );
	          	$update = State::where('id',$id)->update($data);
	          
	            if ($update) {	            
	              return Redirect::to("admin/state")->withSuccess('State Successfull Updated.');
	            }else{
	              return Redirect::to("admin/edit-state/$id")->withFail('Something went to wrong.');
	              }
	          }
  			
  		} else {

  			$data['heading'] = 'State';
  			$data['title'] 	 = 'Edit State';
  			$data['info'] 	 = State::find($id);
  			$data['country'] = Country::get();
  			return view('admin.state.edit',$data);
  		}
  	}

  		/************ City **************************/
    
    public function city(Request $request){
    	$data['title'] = "City List";
    	return view('admin.city.list',$data);
    }

    public function cityList(Request $request){
    
    	if($request->ajax()){
		    $query = City::query();
		    
		    $draw   = intval($request->get("draw"));
		    $start  = intval($request->get("start"));
		    $length = intval($request->get("length"));

		    if ($request['search']['value'] != "") {

                $value = $request['search']['value'];

                $query->where(function ($query) use($value) {
                    $query->where('city_name', "LIKE", "%$value%")
                            ->orWhere('states.state_name', "LIKE", "%$value%")
                            ->orWhere('countries.name', "LIKE", "%$value%");
                });
            }

		        //Order
		        $orderByField = "city.id";
		        $orderBy = 'desc';

		    if (isset($request->get('order')[0]['dir']) && $request->get('order')[0]['dir'] != "") {                        
		        $orderBy = $request->get('order')[0]['dir'];
		    }

		    if (isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] != "") {

		    if ($request->get('order')[0]['column'] == 0) {
		                  
		        $orderByField = "city.id";
		              
		    }else if($request->get('order')[0]['column'] == 1){

		        $orderByField = "city.city_name";             
		    }
		    
		    }

		    $where = array();
		    $field = array('city.*','countries.name as country_name','states.state_name');
            $query->where($where);

            $query->leftjoin('states','states.id','=','city.state_id');
            $query->leftjoin('countries','countries.id','=','states.country_id');

		    $total = $query->count();
		      
		    $info = $query->orderBy($orderByField,$orderBy)->skip($start)->take($length)->get($field); 
		    // print_r($info) ;die;
		    $data = array();
		    $sno = $start;
		    
		    foreach ($info as $city) {
		      $make = $city->status == "Active" ? 'Inactive' : 'Active'; 

		      $statusUrl = URL::to('admin/status_activity',[$city->id, $make, 'city']);

		      $status = '<a type="" class="change_status" data-title="Confirmation" style="text-decoration: none;" href="'.$statusUrl.'" title="Make '.$make. '" data-make="'.$make.'"><i class="'.($city->status == "Active" ? 'fa fa-lock' : 'fa fa-unlock').'"></i>  Make '.$make.'</a>';
		    
		      $showStatus = '<span class = "badge '. ($city->status == "Active" ? "bg-green" : "bg-red").'">'.ucfirst($city->status).'</span>'; 
		    
		      $delet_Url = "'admin/delete_activity/$city->id/city','$city->id'";

		      $deleteUrl = '<a type="" class="recorddelete" style="text-decoration: none;" data-title ="Confirmation" data-placement = "top" title="Delete Record" onclick="remove_record('.$delet_Url.')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete city</a>'; $delet_Url="delete()";
		    
		      $editUrl = URL::to('admin/edit-city',[$city->id]);  
		      //edit url       
		    
		      $edit_url = '<a type="" class="" style="text-decoration: none;" data-title ="Edit city" title="edit-city" href="'.$editUrl.'"><i class="fa fa-edit"></i>Edit city</a>';
		    
		      $viewcityUrl = URL::to('admin/city-list',[$city->id]);
		      $view_city = '<a type="" class="data-title" ="View city" title="edit-city" href="'.$viewcityUrl.'"><i class="fa fa-street-view"></i> View citys</a>';
		            $data[] =array(
		              $sno = $sno+1,
		              ucfirst($city->country_name),
		              ucfirst($city->state_name),
		              ucfirst($city->city_name),
		                $showStatus,
		          '<div class="">
		                    <div class="btn-group">
		                      <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
		                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
		                        <li>'.$status.'</li>
		                        <li>'.$edit_url.'</li>
    	                        <li>'.$view_city.'</li>
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
		} else {
			return "Invalid Request";
		}    

  	}/*city List Data End*/

  	public function addCity(Request $request){

  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        'country_name'	=> 'required',
	        'state_name'	=> 'required',
	        'city_name'		=> 'required|regex:/^[\pL\s\-]+$/u|unique:city']);
	        if ($validation->fails()) {
	          
	          return Redirect::to("admin/add-city")->withErrors($validation)->withInput();
	          
	        }else{

	        	$data = array( 'state_id'	=> $request->state_name,
	        				   'city_name'  => $request->city_name,
	        				   'status'		=> 'Active',
	        				   'created_at' => date('Y-m-d H:i:s'),
	        				 );
	          
	          	$insert = City::insertGetId($data);
	          
	            if ($insert) {	            
	              return Redirect::to("admin/city")->withSuccess('Data Successfull add.');
	            }else{
	              return Redirect::to("admin/add-city")->withFail('Something went to wrong.');
	              }
	          }

  		} else {
  			$data['heading'] = "City";
  			$data['title'] = "Add City";
  			$data['country'] = Country::where('status','Active')->get();
  			$data['state'] = State::where('status','Active')->get();
  			return view('admin.city.add',$data);
  		}
  	}

  	public function editCity(Request $request,$id){

  		if ($request->isMethod('post')) {

  			$validation = validator::make($request->all(),[
	        
	        'country_name'	=> 'required',
	        'state_name'	=> 'required',
	        'city_name'		=> 'required|regex:/^[\pL\s\-]+$/u|unique:city,city_name,'.$request->id]);

	        if ($validation->fails()) {
	          return Redirect::to("admin/edit-city/$id")->withErrors($validation)->withInput();
	        }else{

	        	$data = array( 'state_id'	=> $request->state_name,
	        				   'city_name'  => $request->city_name,
	        				 );
	          	$update = City::where('id',$id)->update($data);
	          
	            if ($update) {	            
	              return Redirect::to("admin/city")->withSuccess('City Successfull Updated.');
	            }else{
	              return Redirect::to("admin/edit-city/$id")->withFail('Something went to wrong.');
	              }
	          }
  			
  		} else {

  			$data['heading'] = 'State';
  			$data['title'] 	 = 'Edit State';
  			$data['info'] 	 = City::where(['city.id'=>$id])
  								->leftjoin('states','states.id','=','city.state_id')->first(['city.*','states.country_id as country_id']);
  			// print_r($data['info']->country_id);die;
  			$data['country'] = Country::where('status','Active')->get();
  			$data['state'] = State::where(['status'=>'Active','country_id'=>$data['info']->country_id])->get();
  			return view('admin.city.edit',$data);
  		}
  	}

  	public function getStates(Request $request){

  		$country_id = $request->country_id;
  		$res['success'] = false;
   		$res['result'] = State::where(['country_id'=>$country_id,'status'=>'Active'])->get();

  		if (count($res['result']) > 0) {

  			$res['success'] = true;
  		}
  		return Response::json($res);

  	}

  	public function getCity(Request $request){
  		$city_id = $request->city_id;
  		$res['success'] = false;
  		$res['result'] = City::where(['state_id'=>$city_id,'status'=>'Active'])->get();

  		if (count($res['result']) > 0 ) {
  			$res['success'] = true;
  		}
  		return Response::json($res);
  	}

    	
    
}
