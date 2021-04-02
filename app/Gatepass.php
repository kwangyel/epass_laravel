<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Gatepass extends Model
{
    protected $fillable =['staff_id','agency','purpose','status','issue_date'];

    public function staff(){
        return $this->belongsTo(Staff::class,'staff_id');
    }

}
