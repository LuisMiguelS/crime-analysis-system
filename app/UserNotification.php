<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $fillable = [
    	'id_usuario', 'ubicacion', 'prioridad', 'leida'
    ];

    public function user ()
    {
    	return $this->belongsTo('App\User');
    }
}
