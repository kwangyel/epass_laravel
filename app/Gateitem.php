<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gatepass;

class Gateitem extends Model
{
    protected $fillable =['gid','name','returnable','status'];

    public function gate_pass(){
        return $this->belongsTo(Gatepass::class,'gid');
    }
}
