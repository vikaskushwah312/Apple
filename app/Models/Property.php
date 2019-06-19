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

}
