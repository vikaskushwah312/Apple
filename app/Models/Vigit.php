<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vigit extends Model
{
   protected $table = 'vigits';
   protected $fillable = ['property_id','user_id','first_name','last_name','email','contact'];
}
