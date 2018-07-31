<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'sexo', 'cedula', 'rol'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userNotifications ()
    {
    	return $this->hasMany('App\UserNotification');
    }

    public function department ()
    {
    	return $this->belongsTo('App\Department');
    }

    public function policeUnit ()
    {
    	return $this->belongsTo('App\PoliceUnit');
    }

    public function recluses ()
    {
        return $this->hasMany('App\Recluse');
    }
}
