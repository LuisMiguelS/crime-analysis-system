<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prision extends Model
{
    protected $fillable = [
    	'id_ubicacion'
    ];

    public function recluses ()
    {
    	return $this->hasMany('App\Recluse');
    }
}
