<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitEvent extends Model
{
    //
    public function Location(){
        return $this->belongsTo('App\Location');
    }
    public function Complaints(){
        return $this->hasMany('App\Complaint');
    }
}
