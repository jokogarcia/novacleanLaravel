<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $guarded=['id'];
    public function Client(){
        return $this->belongsTo("App\User","client_id");
    }
    public function Supervisor(){
        return $this->belongsTo("App\User","supervisor_id");
    }
    public function Sectors(){
        return $this->hasMany('App\Sector');
    }
    public function fullAddress(){
        
        $fA=$this->address_street_name." ".$this->address_street_number;
        if($this->address_floor != null){
            $fA .= ". Piso $this->address_floor";
        }
        if($this->address_appartment != null){
            $fA .= ". Departamento $this->address_appartment";
        }
        $fA .= ".";
        return $fA;
    }
    public function VisitEvents(){
        return $this->hasMany('App\VisitEvent');
    }
    public function City(){
        return $this->belongsTo('App\City');
    }
}
