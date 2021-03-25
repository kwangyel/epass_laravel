<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable =['name','staff_id','agency','name', 'cid','address', 'contact','status',];
}
