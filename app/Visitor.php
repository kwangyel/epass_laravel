<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Visitor extends Model
{
    protected $fillable =['arrivaltime','staff_id','agency','name', 'cid','address', 'contact','status'];


    public function staff(){

        return $this->belongsTo(Staff::class);
    }

    public function agency(){

        return $this->belongsTo(Staff::class);
    }
  
}
