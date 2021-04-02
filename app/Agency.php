<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Agency extends Model
{
         protected $fillable =['name'];


    public function staff(){

    return $this->belongsTo(Staff::class);
 }

}
