<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','mobile_number',
                         'amount','status',
                       'order_id','transaction_id'];
}
