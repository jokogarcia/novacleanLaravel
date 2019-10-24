<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
    protected $guarded=['id'];
    protected $with = ['Tasks'];
    public function Tasks(){
        return $this->hasMany('App\Task');
    }
    public function Location(){
        return $this->belongsTo('App\Location');
    }
}
