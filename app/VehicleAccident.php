<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleAccident extends Model
{
    protected $protected = [
    	'vehicle_id', 'ubication_id', 'titular'
    ];

    
    /* Relaciones entre modelos */

    public function vehicle ()
    {
    	return $this->belongsTo('App\Vehicle');
    }

    public function ubication ()
    {
    	return $this->belongsTo('App\Ubication');
    }


    /* Assesors */

    public function getCreatedAtAttribute ($created_at)
    {   
        $fecha = date_create($created_at);
        
        return date_format($fecha, 'd/m/Y');
    }
}
