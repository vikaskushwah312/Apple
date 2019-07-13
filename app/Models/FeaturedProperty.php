<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FeaturedProperty extends Model
{
    protected $table = 'featured_property';

    
   //To get the all fetured property those will show on home page 
    public function fatured(){
        return $this->hasOne('App\Models\FeaturedProperty','property_id','id');
    }
     public function cop() //contact of person
    {	
    	return $this->hasOne('App\Models\ContactOfPerson', 'property_id', 'id');
    }
}
