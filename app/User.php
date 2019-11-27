<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['UserRole', 'City'];
    
    public function WorkExperiences(){
        return $this->hasMany('App\WorkExperience');
    }
    public function AcademicExperiences(){
        return $this->hasMany('App\AcademicExperience');
    }
    public function UserRole(){
        return $this->belongsTo('App\UserRole');
    }
    public function CondicionAfip(){
        return $this->belongsTo('App\CondicionAfip');
    }
    public function Locations(){
        return $this->hasMany('App\Location','client_id');
    }
    public function ReceivedComplaints(){
        return $this->belongsToMany('App\Complaint','employee_complaint','employee_id','complaint_id');
    }
    public function Complaints(){
        return $this->hasMany('App\Complaint','client_id');
    }
    public function City(){
        return $this->belongsTo('App\City');
    }
    public function hasAnyRole($rolesArray){
        $pass=false;
        foreach($rolesArray as $role){
            if($this->UserRole->role == $role){
                $pass = true;
            }
        }
        abort_unless($pass,403);
    }
    public function generateToken()
    {
        $this->api_token = bin2hex(random_bytes(30)); //gives 30x2 hexadecimal characters 
        $this->save();

        return $this->api_token;
    }
    public function getPhotoURL(){
        if($this->photo_url != null)
            return $this->photo_url;
        else
            return "/images/users/no-photo.jpg";
    }
    public function getNameWithLink(){
        return "<a href='/users/$this->id'>$this->last_name,$this->name</a>";
    }
}
