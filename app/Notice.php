<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
    	'titular', 'descripcion', 'img'
    ];

    public function getImgAttribute ($img)
    {
    	return asset('images_news/placeholder.jpg');
    }
}
