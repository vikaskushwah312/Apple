<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public function cop() //contact of person
    {	
    	return $this->hasOne('App\Models\ContactOfPerson', 'property_id', 'id');
    }

    public function imgGallery() //to get the all images of property
    {
    	return $this->hasOne('App\Models\GalleryImage', 'property_id', 'id');
    }

    public function features() //to get the all images of property
    {
    	return $this->hasMany('App\Models\PropertyFeatures', 'property_id', 'id');
    }

   //To get the all fetured property those will show on home page 
    public function fatured(){
        return $this->hasOne('App\Models\FeaturedProperty','property_id','id');
    }

}
