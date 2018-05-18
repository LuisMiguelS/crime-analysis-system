<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
	protected $fillable = [
		'nombre_ubicacion', 'latitud', 'longitud'
	];

	public function cartAccidents ()
    {
    	return $this->hasMany('App\CartAccident');
    }

    /*public function crimes ()
    {
    	return $this->belongsToMany('App\Crime');
    }*/
}
