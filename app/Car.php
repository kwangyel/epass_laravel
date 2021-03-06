<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency;

class Car extends Model
{
    protected $fillable =['agency_id','status','vnumber'];


    public function agency(){

        return $this->belongsTo(Agency::class,'agency_id');
    }

    public function staff(){

        return $this->belongsTo(Staff::class);
    }

}
