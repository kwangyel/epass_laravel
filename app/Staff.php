<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable =['name','cid','role', 'agency_id', 'contact', 'status'];


    public function getRouteKeyName() {
        
        return 'agency_id';
    }

    public function agency(){

        return $this->belongsTo(Agency::class);
    }
}
