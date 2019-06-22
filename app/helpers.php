<?php
use App\Models\User;

function getPrifileImage($id){
	$img = User::where('id',$id)->first(['image']);
	$path = url(''.Config::get('constants.NO_Image').'');
	if($img->image){
		$path = url(''.Config::get('constants.PROFILE_IMAGE').''.$img->image);
	}
	return $path;
}

function logoImage()	{
	return url('public/img/logos/logo.png');
}

//it will take a properte id and send url 
function searchImage(){

	return url('public/img/search1.jpg');
}
function searchBigImage(){
	return url('public/img/search2.jpg');
}

function searchSmallImage(){
	return url('public/img/search2.jpg');
}
?>