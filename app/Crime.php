<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    protected $fillable = [
    	'nombre_crimen'
    ];


    /* Relaciones entre modelos */

    public function persons ()
    {
        return $this->belongsToMany('App\Person')
            ->withPivot('titular','descripcion', 'created_at');
    }


    /* Assesors */

    public function getNombreCrimenAttribute ($crimen)
    {
        return ucwords($crimen);
    }
}
