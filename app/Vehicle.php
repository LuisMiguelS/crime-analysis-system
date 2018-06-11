<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $private = [
    	'person_id', 'numero_placa', 'numero_chasis', 'marca', 'modelo', 'year_fabricacion', 'color', 'status', 'pertenencia'
    ];


    /* Relaciones entre modelos */

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

    public function vehicleAccidents ()
    {
        return $this->hasMany('App\VehicleAccident');
    }


    /* Assesors */

    public function getMarcaAttribute ($marca)
    {
        return ucwords($marca);
    }

    public function getModeloAttribute ($modelo)
    {
        return ucwords($modelo);
    }
}
