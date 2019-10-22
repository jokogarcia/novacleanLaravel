<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicExperience extends Model
{
    //
    protected $guarded =['id'];
    public function user(){ return $this->belongsTo('User');}
    public function AcademicLevel(){
        return $this->belongsTo('App\AcademicLevel');
    }
}
