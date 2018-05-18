<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
    	'cedula', 'nombres', 'apellidos', 'sexo', 'fecha_nac', 'residencia'
    ];

    public function dangerPeople ()
    {
    	return $this->hasMany('App\DangerPerson');
    }

    public function recluses ()
    {
    	return $this->hasMany('App\Recluse');
    }

    public function vehicles ()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function cartAccidents ()
    {
    	return $this->hasMany('App\CartAccident');
    }

    public function crimes ()
    {
        return $this->belongsToMany('App\Crime')
            ->withPivot('titular','descripcion', 'created_at');
    }
}
