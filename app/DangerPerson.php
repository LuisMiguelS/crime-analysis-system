<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangerPerson extends Model
{
    protected $fillable = [
    	'id_persona', 'titular', 'descripcion', 'status'
    ];

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }
}
