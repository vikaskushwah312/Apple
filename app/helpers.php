<?php
use App\Models\User;

function getPrifileImage($id){
	$img = User::where('id',$id)->first(['image']);
	$path = url(''.Config::get('constants.PROFILE_IMAGE').''.$img->image);
	return $path;
}

function logoImage()	{
	return url('public/img/logos/logo.png');
}

?>