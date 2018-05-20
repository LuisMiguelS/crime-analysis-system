<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangerPerson extends Model
{
    protected $fillable = [
    	'person_id', 'titular', 'descripcion', 'status'
    ];

    public function person ()
    {
    	return $this->belongsTo('App\Person');
    }
}
