<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangerPerson extends Model
{
    protected $fillable = [
    	'person_id', 'titular', 'descripcion', 'status', 'atrapado'
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

    public function getUpdatedAtAttribute ($fecha)
    {
        $date = date_create($fecha);
        $fecha = $date->format('d-m-Y');

        return $fecha;
    }

    public function getStatusPersonAttribute ()
    {
    	if($this->status == 'buscado')
    		return '<span class="badge badge-danger">'.ucwords($this->status.('(a)')).'</span>';
    	if($this->status == 'desaparecido')
    		return '<span class="badge badge-warning">'.ucwords($this->status.('(a)')).'</span>';
    }

    public function getFueAtrapadoAttribute ()
    {
        return '<span class="badge badge-success">'.ucwords($this->atrapado.('(a)')).'</span>';
    }
}
