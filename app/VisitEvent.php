<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitEvent extends Model
{
    //
    protected $with=['Tasks','AssignedEmployees'];
    protected $guarded=['id'];
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
        return $this->belongsToMany('App\User','employee_visit_event',
                'visit_event_id','employee_id');
    }
    public function Days(){
        if(!$this->repeats){
            return date($this->date);
        }
        $days=[];
        if( $this->monday &&
            $this->tuesday &&
            $this->thursday &&
            $this->wednesday &&
            $this->friday &&
            $this->saturday &&
            $this->sunday
            ){
            return "Todos los días";
            }
        if( $this->monday &&
            $this->tuesday &&
            $this->thursday &&
            $this->wednesday &&
            $this->friday &&
            $this->saturday
            ){
            return "Lunes a Sábado";
            }
        if( $this->monday &&
            $this->tuesday &&
            $this->thursday &&
            $this->wednesday &&
            $this->friday
            
            ){
            return "Lunes a Viernes";
            }
        if($this->monday){
            array_push($days,"Lunes");
        }
        if($this->tuesday){
            array_push($days,"Martes");
        }
        if($this->wednesday){
            array_push($days,"Miércoles");
        }
        if($this->thursday){
            array_push($days,"Jueves");
        }
        if($this->friday){
            array_push($days,"Viernes");
        }
        if($this->saturday){
            array_push($days,"Sábado");
        }
        if($this->sunday){
            array_push($days,"Domingo");
        }
        if(count($days)==0)
            return "nodays";
        if(count($days)==1)
            return $days[0];
        $lastDay = array_pop($days);
        return implode(", ",$days)." y $lastDay";
        
    }
}
