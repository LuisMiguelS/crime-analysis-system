<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleAccident extends Model
{
    protected $protected = [
    	'id_persona', 'id_ubicacion', 'titular', 'descripcion'
    ];

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }

    public function ubication ()
    {
    	return $this->belongsTo('App\Ubication');
    }
}
