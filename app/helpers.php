<?php
use App\Models\{User,Property,GalleryImage};

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