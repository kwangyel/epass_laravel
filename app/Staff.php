<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable =['name','cid','role', 'agency_id', 'contact', 'status'];
}
