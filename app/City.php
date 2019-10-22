<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function Province(){
        return $this->belongsTo('App\Province');
    }
    public function Locations(){
        return $this->hasMany('App\Location');
    }
    public function Users(){
        return $this->hasMany('App\User');
    }
}
