<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prision extends Model
{
    protected $fillable = [
    	'nombre_prision', 'direccion'
    ];


    /* Relaciones entre modelos */

    public function recluses ()
    {
    	return $this->hasMany('App\Recluse');
    }


    /* Assesors */

    public function getNombrePrisionAttribute ($prision)
    {
        return ucwords($prision);
    }

    public function getDireccionAttribute ($direccion)
    {
        return ucwords($direccion);
    }
}
