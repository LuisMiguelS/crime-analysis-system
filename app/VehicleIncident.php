<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleIncident extends Model
{
    protected $protected = [
    	'id_vehiculo', 'estado', 'encontrado'
    ];

    public function vehicle ()
    {
    	return $this->belongsTo('App\Vehicle');
    }
}
