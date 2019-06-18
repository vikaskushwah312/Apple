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
}
