<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleTransfer extends Model
{
    protected $protected = [
    	'antiguo_propietario', 'nuevo_propietario', 'id_vehiculo'
    ];

    public function vehicle ()
    {
    	return $this->belongsTo('App\Vehicle');
    }
}
