<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Visitor;
use App\Staff;

class Check extends Model
{
    protected $fillable =['checkintime','checkouttime', 'staff_id','visitor_id','car_id','role_id','contact', 'status',];

    public function staff(){

        return $this->belongsTo(Staff::class,'staff_id');
    }
    public function staffs(){

        return $this->belongsTo(Staff::class,'role_id');
    }

    public function car(){

        return $this->belongsTo(Car::class,'car_id');
    }

    public function visitor(){

        return $this->belongsTo(Visitor::class,'visitor_id');
    }
}
