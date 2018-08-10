<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
    	'titular', 'descripcion', 'img'
    ];

    public function getImgAttribute ()
    {
    	return asset('images_news/'.$this->id.'.jpg');
    }

    public function getCreatedAtAttribute ($fecha)
    {
        $date = date_create($fecha);
        $fecha = $date->format('d-m-Y');

        return $fecha;
    }

    public function getTitularAttribute ($titular)
    {
        return ucfirst($titular);
    }
}
