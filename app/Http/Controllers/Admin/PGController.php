<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User};
use URL,Validator,Redirect;

class PGController extends Controller
{
    public function pgList(Request $request){

    	if($request->ajax()){
		    $query = User::query();
		    
		    $draw   = intval($request->get("draw"));
		    $start  = intval($request->get("start"));
		    $length = intval($request->get("length"));

		    if ($request['search']['value'] != "") {

                $value = $request['search']['value'];

                $query->where(function ($query) use($value) {
                    $query->where('first_name', "LIKE", "%$value%")
                            ->orWhere('last_name', "LIKE", "%$value%")
                            ->orWhere('email', "LIKE", "%$value%")
                            ->orWhere('contact_no', "LIKE", "%$value%");

                });
            }
		        //Order
		        $orderByField = "users.id";
		        $orderBy = 'desc';

		    if (isset($request->get('order')[0]['dir']) && $request->get('order')[0]['dir'] != "") {                        
		        $orderBy = $request->get('order')[0]['dir'];
		    }

		    if (isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] != "") {

			    if ($request->get('order')[0]['column'] == 0) {
			                  
			        $orderByField = "users.id";
			              
			    }else if($request->get('order')[0]['column'] == 1){

			        $orderByField = "users.first_name";             
			    }else if($request->get('order')[0]['column'] == 2){

			        $orderByField = "users.last_name";             
			    }
		    
		    }

		      
		   $info = $query->where(['status'=>'Active','user_type'=>3])->orderBy($orderByField,$orderBy)->skip($start)->take($length)->get();  
		    $total = $query->count();
		          
		    $data = array();
		    $sno = $start;
		    
		    foreach ($info as $pg) {
		      $make = $pg->status == "Active" ? 'Inactive' : 'Active'; 

		      $statusUrl = URL::to('admin/status_activity',[$pg->id, $make, 'pg']);

		      $status = '<a type="" class="change_status" data-title="Confirmation" style="text-decoration: none;" href="'.$statusUrl.'" title="Make '.$make. '" data-make="'.$make.'"><i class="'.($pg->status == "Active" ? 'fa fa-lock' : 'fa fa-unlock').'"></i>  Make '.$make.'</a>';
		    
		      $showStatus = '<span class = "badge '. ($pg->status == "Active" ? "bg-green" : "bg-red").'">'.ucfirst($pg->status).'</span>'; 
		    
		      	//For Block and UnBlock
		      	$make_b = $pg->block_unblock == "Block" ? 'Unblock' : 'Block'; 

		      	$block_unblock_Url = URL::to('admin/block_unblock',[$pg->id, $make_b, 'Pg']);

		      	$status = '<a type="" class="change_status" data-title="Confirmation" style="text-decoration: none;" href="'.$block_unblock_Url.'" title="Make '.$make_b. '" data-make="'.$make_b.'"><i class="'.($pg->block_unblock == "Block" ? 'fa fa-lock' : 'fa fa-unlock').'"></i>  Make '.$make_b.'</a>';

		      	if ($pg->block_unblock == "Block") { //when paying guest is block
		      		$block_button = '<div class="">
		                    <div class="btn-group">
		                    	<a href="'.$block_unblock_Url.'" title="Make '.$make_b.'">
		                      <button type="button" class="btn btn-danger">UnBlock</button></a>
		                    </div>
		                </div>';
		      	} else { //when owner is unblock
		      		$block_button = '<div class="">
		                    <div class="btn-group">
		                      <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
		                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
		                        <li>'.$status.'</li>
		                      </ul>
		                    </div>
		                  </div>';
		      	}

		            $data[] =array(
		              $sno = $sno+1,
		                ucfirst($pg->first_name.' '.$pg->last_name),
		                $pg->email,
		                $pg->contact_no,
		                $showStatus,
		          		$block_button
		            ); 
		    }/*foreach*/

		        $output = array(
		                      "draw"            => $draw,
		                      "recordsTotal"    => $total,
		                      "recordsFiltered"  => $total,
		                      "data"             => $data
		                    );
		        echo json_encode($output);
		        exit();
		} else {
			$data['title'] = "Paying Guest List";
			return view('admin.pg.pg_list',$data);
		}
    }



}
