<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
     protected $guarded=['id'];

    public function Employee(){
        return $this->belongsTo('App\User','employee_id');
    }
    public function VisitEvent(){
        return $this->belongsTo('App\VisitEvent', 'visit_event_id');
    }
}
