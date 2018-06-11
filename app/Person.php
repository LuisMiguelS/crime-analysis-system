<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
    	'cedula', 'nombres', 'apellidos', 'sexo', 'fecha_nac', 'residencia', 'nacionalidad', 'estado_civil'
    ];


    /* Relaciones entre modelos */

    public function dangerPeople ()
    {
    	return $this->hasMany('App\DangerPerson');
    }

    public function recluses ()
    {
    	return $this->hasMany('App\Recluse');
    }

    public function vehicles ()
    {
        return $this->hasMany('App\Vehicle');
    }

    public function crimes ()
    {
        return $this->belongsToMany('App\Crime')
            ->withPivot('titular','descripcion', 'created_at');
    }

    /*public function reclusePrision ()
    {
        //  primer argumento del metodo hasManyPrision(): "el nombre del ultimo modelo"
        //  segundo argumento del metodo hasManyPrision(): "el nombre del modelo intermedio"

        return $this->hasManyThrough('App\Prision', 'App\Recluse', 'person_id', 'id');
    }*/


    /* Assesors */

    public function getNombresAttribute ($nombres)
    {
        return ucwords($nombres);
    }

    public function getApellidosAttribute ($apellidos)
    {
        return ucwords($apellidos);
    }

    public function getResidenciaAttribute ($residencia)
    {
        return ucwords($residencia);
    }

    public function getAliasAttribute ($alias)
    {
        return ucwords($alias);
    }

    public function getSexoAttribute ($sexo)
    {
        if($sexo == 'm')
            return 'Masculino';

        return 'Femenino';
    }

    public function getEstadoCivilAttribute ($sexo)
    {
        if($sexo == 'c')
            return 'Casado(a)';

        return 'Soltero(a)';
    }

    public function getEdadAttribute ($edad)
    {
        /* obteniendo las fechas */
        
        $fecha_nac = date_create($this->fecha_nac);
        $fecha_sistema = date_create(date('Y-m-d'));

        /* calculando la edad */

        $diff = date_diff($fecha_nac, $fecha_sistema);
        $edad = round($diff->days / 365).' años';

        return $edad;
    }

    public function getIdentificacionAttribute ()
    {
        $cedula = $this->cedula;

        return substr($cedula, 0, 3).'-'.substr($cedula, 3, 7).'-'.substr($cedula, 10);
    }
}
