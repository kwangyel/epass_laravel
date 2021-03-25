<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable =['checkintime','checkouttime', 'staff_id','visitor_id','car_id','role_id','contact', 'status',];
}
