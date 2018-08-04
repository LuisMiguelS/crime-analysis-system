<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Crime;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CrimesController extends Controller
{
    public static function consultigCriminalProfile ()
    {
        $people = Person::all();

    	return view('admin.crimes.consulting_crime_profile', compact('people'));
    }

    public static function criminalProfile (Request $request)
    {
    	$person = Person::findOrFail($request->cedula);
        $ultima_condena = optional($person->recluses->last());
        $prision = optional($person->recluses()->with('prision')->get()->last())->prision;
        $danger_person = optional($person)->dangerPeople;

    	return view('admin.crimes.crime_profile', [
    		'person' => $person,
            'ultima_condena' => $ultima_condena,
            'prision' => $prision,
            'notificaciones' => $danger_person,
            'danger_person' => $danger_person->last()
    	]);
    }

    public static function generalConsulting ()
    {
        $crimes = Crime::all();
        $years = DB::select('select year(cp.created_at) yyear from crime_person cp group by (yyear)');

        return view('admin.crimes.general_consulting', [
            'crimenes' => $crimes,
            'years' => $years
        ]);
    }

    public static function generateData (Request $request)
    {
        $denominador = 0;

        // meses del año en _ES
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        // obtiene los crimenes sucedidos por meses
        $mes_crimen = DB::select('select month(cp.created_at) as mes, count(cp.crime_id) as total from crimes c, crime_person cp where c.id = cp.crime_id and year(cp.created_at) = ? and c.id = ? group by month(cp.created_at) order by mes asc', array($request->year, $request->crimen));

        // obtiene los crimenes por armas usadas
        $armas_crimen = DB::select('select upper(w.nombre_arma) as arma, count(cp.crime_id) as total from crimes c, crime_person cp, weapons w where c.id = cp.crime_id and cp.weapon_id = w.id and year(cp.created_at) = ? and c.id = ? group by w.nombre_arma', array($request->year, $request->crimen));

        // obtiene las ubicaciones y la cant. de crimenes
        $ubications = DB::select('select upper(u.nombre_ubicacion) ubicacion, count(cp.crime_id) as total, u.latitud, u.longitud from crimes c, crime_person cp, ubications u where c.id = cp.crime_id and cp.ubication_id = u.id and year(cp.created_at) = ? and c.id = ? group by cp.ubication_id', array($request->year, $request->crimen));

        // obtiene la cant. de crimenes sucedidos por año
        $year_crimenes = DB::select('select count(cp.id) as total, year(cp.created_at) yyear from crimes c, crime_person cp where c.id = cp.crime_id and c.id = ? group by year(cp.created_at) order by year(cp.created_at) asc', array($request->crimen));

        // obtiene las personas que han cometido igual crimen
        $person_crimen = DB::select('select distinct(p.id), count(p.id) total, concat(upper(p.nombres), " ", upper(p.apellidos)) nombre, p.cedula from crime_person cp, people p where cp.person_id = p.id and cp.crime_id = ? and year(cp.created_at) = ? group by p.id order by total desc', array($request->crimen, $request->year));

        foreach($mes_crimen as $mes)
        {
            $nombres_mes[] = $meses[$mes->mes - 1];
            $cant_crimen[] = $mes->total;
        }

        foreach($armas_crimen as $totales)
        {
            $denominador += $totales->total;
        }

        foreach($armas_crimen as $arma)
        {
            $nombres_arma[] = $arma->arma;
            $cant_armas[] = number_format(($arma->total / $denominador) * 100, 2);
        }


        /* Retornando la respuesta en formato JSON */

        $response = array(
            'status' => 'success',
            'nombres_arma' => $nombres_arma,
            'cant_armas' => $cant_armas,
            'nombres_mes' => $nombres_mes,
            'cant_crimen' => $cant_crimen,
            'ubications' => $ubications,
            'year_crimenes' => $year_crimenes,
            'person_crimen' => $person_crimen
        );

        return response()->json(['data' => $response]);
    }
}

/*dd(
    Person::with(['recluses' => function($query) {
        $query->with(['prision'])->get();
    }])
        ->get()
        ->toArray()
);*/