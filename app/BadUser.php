<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadUser extends Model
{
    protected $fillable = [
        'name', 'id_card'
    ];
}
