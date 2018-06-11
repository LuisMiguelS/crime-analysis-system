<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    	'ubication_id'
    ];

    public function polices ()
    {
    	return $this->hasMany('App\User');
    }

    public function policeUnits ()
    {
    	return $this->hasMany('App\PoliceUnit');
    }
}
