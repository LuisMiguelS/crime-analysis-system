<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recluse extends Model
{
    protected $fillable = [
    	'id_persona', 'id_prision', 'id_oficial', 'titular', 'descripcion', 'estado', 'fecha_salida'
    ];

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
}
