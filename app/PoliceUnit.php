<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoliceUnit extends Model
{
    protected $fillable [
    	'id_oficial', 'codigo_unidad'
    ];

    public function polices ()
    {
    	return $this->hasMany('App\User');
    }

    public function department ()
    {
    	return $this->belongsTo('App\Department');
    }

    public function transportUnit ()
    {
    	return $this->belongsTo('App\TransportUnit');
    }
}
