<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $private = [
    	'id_persona', 'numero_placa', 'numero_chasis', 'color', 'estado', 'econtrado', 'pertenencia'
    ];

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }

    public function vehicleIncidents ()
    {
    	return $this->hasMany('App\VehicleIncident');
    }

    public function vehicleTransfers ()
    {
    	return $this->hasMany('App\VehicleTransfer');
    }
}
