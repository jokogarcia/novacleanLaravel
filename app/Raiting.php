<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raiting extends Model
{
    //
    protected $guarded=['id'];

    public function Client(){
        return $this->belongsTo('App\User','client_id');
    }
    public function VisitEvent(){
        return $this->belongsTo('App\VisitEvent', 'visit_event_id');
    }
}
