<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportUnit extends Model
{
    protected $fillable = [
    	'placa', 'modelo', 'year'
    ];

    public function policeUnit ()
    {
    	return $this->belongsTo('App\PoliceUnit');
    }
}
