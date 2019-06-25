<?php
use App\Models\{User,Property,GalleryImage,ContactOfPerson};

function getPrifileImage($id){
	$img = User::where('id',$id)->first(['image']);
	$path = url(''.Config::get('constants.NO_Image').'');
	if($img->image){
		$path = url(''.Config::get('constants.PROFILE_IMAGE').''.$img->image);
	}
	return $path;
}

// to show the image in my propertey list page
function myPropertiesImage($id){
	$img = GalleryImage::where('property_id',$id)->first(['image']);
	
	if($img != ''){
		$path = url(''.Config::get('constants.Gallery_Image').$img->image);

		return '<img src="'.$path.'" alt="listing-photo" class="img-fluid">';
		
	} else {
		
		$path = url(''.Config::get('constants.NO_Image').'');	
		return '<img src="'.$path.'" alt="listing-photo" class="img-fluid">';
	}
}

// to show the image in my propertey list page
function myPropertiesImageUrl($id){
	$img = GalleryImage::where('property_id',$id)->first(['image']);
	
	if($img != ''){
		$path = url(''.Config::get('constants.Gallery_Image').$img->image);

	} else {
		$path = url(''.Config::get('constants.NO_Image').'');	
	}
	return $path;
}

function logoImage()	{
	$url = url('public/img/logos/logo.png');
	return '<img src="'.$url.'" alt="logo1" height="50px;"width=70px;>';
}

//it will take a properte id and send url 
function searchImage(){

	return url('public/img/search1.jpg');
}
//get the images for silder
function searchBigImage($id){
	$img = GalleryImage::where('id',$id)->first(['image']);
	if($img != ''){
		$path = url(''.Config::get('constants.Gallery_Image').$img->image);

	} else {
		$path = url(''.Config::get('constants.NO_Image').'');	
	}
	return '<img src="'.$path.'" class="" alt="slider-properties" width="730px;" height="486px;">';
}


function searchSmallImage($id){
	
	$img = GalleryImage::where('id',$id)->first(['image']);
	if($img != ''){
		$path = url(''.Config::get('constants.Gallery_Image').$img->image);

	} else {
		$path = url(''.Config::get('constants.NO_Image').'');	
	}
	return '<img src="'.$path.'" class="" alt="properties-small" width="146px;" height="97px;">';
}

// get the name of contact person for property
function copName($id){
	$name = ContactOfPerson::where('property_id',$id)->first(['name']);
	return $name['name'];
}
// get the mobile no of contact person for property
function copPhone($id){
	$phone = ContactOfPerson::where('property_id',$id)->first(['phone']);
	return $phone['phone'];
}
?>