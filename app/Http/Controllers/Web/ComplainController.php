<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User,Features,Property,PropertyFeatures,State,ContactOfPerson,GalleryImage,FeaturedProperty,Book,Payment,Complain,ComplainReply};
use Validator,Redirect,Session;
class ComplainController extends Controller {
/*###################################### FOR OWNER GUEST #####################################*/ 

/*
* purpose: get all the complain list of owner property
*/
public function getComplainList(Request $request){
	$user_id = auth('user')->id();
   	$data['title'] = 'Complain List';
	//get the all complian 
    $data['property'] = Complain::where(['complain.status'=>'Active','property.p_status'=>'Active','property.added_by'=>$user_id,'property.booked'=>1])
    						->leftjoin('property','complain.property_id','=','property.id')
        					->orderBy('created_at','desc')
        					->get(['property.*','complain.id as complain_id']);
	// print_r($data['property']);die;
    return view('web.owner.complain.complain_list',$data);

}
/*
*purpose : Reply given by the owner of property 
*/
public function complainReply(Request $request,$complain_id){
	
	if($request->isMethod('post'))	{

		$validation = Validator::make($request->all(),[
            
            'complain_reply'    => 'required',
            ]);

            if ($validation->fails()) {
              return Redirect::to("owner/complain-reply/$complain_id")->withErrors($validation)->withInput();
            }else{

                $data = array(  'reply' 		=> $request->complain_reply,
                				'complain_id'	 => $complain_id ,
                				'created_at'     => date('Y-m-d H:i:s'),
                             );
                
                $insert = ComplainReply::insertGetId($data);

                if ($insert) {              
                  return Redirect::to("owner/complain-list")->withSuccess('You have Successfull Reply.');
                }else{
                  return Redirect::to("owner/complain-reply/$complain_id")->withFail('Something went to wrong.');
                  }
            }
	} else { //get method
		$data['title'] = 'Complain Reply';
		$data['complain'] = Complain::where(['id'=>$complain_id])->first();
		return view('web.owner.complain.complain_reply',$data);
	}
}




/*###################################### FOR PAYING GUEST #####################################*/ 

  public function complainStatus(Request $request,$id){
    // $id=complain_id
    $data['title'] = 'Complain';
    // ComplainReply
    $filed = array('complain.*','complain_reply.reply');
    $data['complain'] = Complain::where('complain.id',$id)
                              ->leftjoin('complain_reply','complain.id','=','complain_reply.complain_id')
                              ->first($filed);
    // print_r($data['result'] );die;

    return view('web.pg.complain.complain_solve',$data);
  }
}