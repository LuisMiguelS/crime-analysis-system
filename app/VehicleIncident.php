<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleIncident extends Model
{
    protected $protected = [
    	'vehicle_id', 'status', 'encontrado'
    ];


    /* Relaciones entre modelos */

    public function vehicle ()
    {
    	return $this->belongsTo('App\Vehicle');
    }


    /* Assesors */

    public function getStatusAttribute ($status)
    {
        return ucwords($status);
    }

    public function getCreatedAtAttribute ($created_at)
    {   
    	$fecha = date_create($created_at);
        
        return date_format($fecha, 'd/m/Y');
    }
}
