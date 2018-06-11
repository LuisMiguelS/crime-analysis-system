<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleTransfer extends Model
{
    protected $protected = [
    	'person_id', 'person_new_id', 'vehicle_id'
    ];

    public function vehicle ()
    {
    	return $this->belongsTo('App\Vehicle');
    }

    public function person ()
    {
    	return $this->belongsTo('App\Person', 'person_new_id');
    }
}