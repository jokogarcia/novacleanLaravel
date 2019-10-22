<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //
    public function Client(){
        return $this->belongsTo('App\User','client_id');
    }
    public function VisitEvent(){
        return $this->belongsTo('App\VisitEvent', 'visit_event_id');
    }
}
