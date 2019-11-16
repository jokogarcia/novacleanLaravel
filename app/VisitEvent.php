<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitEvent extends Model
{
    //
    protected $with=['Tasks','AssignedEmployees'];
    public function Location(){
        return $this->belongsTo('App\Location');
    }
    public function Complaints(){
        return $this->hasMany('App\Complaint');
    }
     public function Raitings(){
        return $this->hasMany('App\Raiting');
    }
    public function Tasks(){
        return $this->belongsToMany('App\Task');
    }
    public function AssignedEmployees(){
        return $this->belongsToMany('App\User','employee_visit_event','visit_event_id','employee_id');
    }
}
