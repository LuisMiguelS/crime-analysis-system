<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recluse extends Model
{
    protected $fillable = [
    	'person_id', 'prision_id', 'user_id', 'titular', 'descripcion', 'years', 'fecha_salida', 'status'
    ];

    
    /* Relaciones entre modelos */

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }

    public function prision ()
    {
    	return $this->belongsTo('App\Prision');
    }

    public function vehicles ()
    {
    	return $this->hasMany('App\Vehicle');
    }

    public function police ()
    {
        return $this->belongsTo('App\User');
    }


    /* Assesors */

    public function getCreatedAtAttribute ($fecha)
    {
        $date = date_create($fecha);
        $fecha = $date->format('d-m-Y');

        return $fecha;
    }

    public function getFechaSalidaAttribute ($fecha)
    {
        $date = date_create($fecha);
        $fecha = $date->format('d-m-Y');

        return $fecha;
    }

    public function getStatusCarcelAttribute ()
    {
        $status = $this->status;

        if($status == 'c')
            return '<p class="text-success">CUMPLIDA</p>';
        else if($status == 'p')
            return '<p class="text-warning">EN PROCESO</p>';
        
        return '<p class="text-info">EXONERADO(A)</p>';
    }
}
