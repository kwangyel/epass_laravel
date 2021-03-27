<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Visitor extends Model
{
    protected $fillable =['name','staff_id','agency','name', 'cid','address', 'contact','status',];


    public function staff(){

        return $this->belongsTo(Staff::class,'staff_id');
    }

    
}
