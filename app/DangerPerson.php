<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangerPerson extends Model
{
    protected $fillable = [
    	'person_id', 'titular', 'descripcion', 'status'
    ];


    /* Relaciones entre modelos */

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }


    /* Assesors */

    public function getTitularAttribute ($titular)
    {
        return ucwords($titular);
    }

    public function getCreatedAtAttribute ($fecha)
    {
        $date = date_create($fecha);
        $fecha = $date->format('d-m-Y');

        return $fecha;
    }

    public function getStatusAttribute ($status)
    {
    	if($status == 'buscado')
    		return '<span class="badge badge-danger">'.ucwords($status).'</span>';
    	if($status == 'desaparecido')
    		return '<span class="badge badge-warning">'.ucwords($status).'</span>';

    	return $status;
    }
}
