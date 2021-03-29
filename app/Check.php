<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Visitor;
use App\Staff;

class Check extends Model
{
    protected $fillable =['time', 'staff_id','visitor_id','car_id','contact', 'type'];

    public function staff(){

        return $this->belongsTo(Staff::class,'staff_id');
    }
    
    public function car(){

        return $this->belongsTo(Car::class,'car_id');
    }

    public function visitor(){

        return $this->belongsTo(Visitor::class,'visitor_id');
    }
}
