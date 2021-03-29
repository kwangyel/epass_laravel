<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Gatepass extends Model
{
    protected $fillable =['staff_id','agency','purpose'];

    public function staff(){
        return $this->belongsTo(Staff::class,'staff_id');
    }
}
