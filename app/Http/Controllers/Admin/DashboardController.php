<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\DangerPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public static function index()
    {
        /* Cant. de los distintos incidentes/crimenes del año en curso */

        $cant_crimenes = DB::select('select count(id) cant from crime_person where year(created_at) = ?', array(date('Y')));
    	$cant_reclusos = DB::select('select count(id) cant from recluses where year(created_at) = ?', array(date('Y')));
    	$cant_accidentes = DB::select('select count(id) cant from vehicle_accidents where year(created_at) = ?', array(date('Y')));
    	$cant_incidentes = DB::select('select count(id) cant from vehicle_incidents where year(created_at) = ?', array(date('Y')));

        /* Cant. de prisioneros por año */

        $prisioneros_yyear = DB::select('select count(r.id) cant, year(r.created_at) yyear from recluses r group by year(r.created_at) order by year(r.created_at) desc limit 10');


        /* Estadística de los distintos incidentes/crimenes sucedidos */

        $crimenes = DB::select('select upper(c.nombre_crimen) as crimen, count(cp.crime_id) as total from crimes c, crime_person cp where c.id = cp.crime_id and year(cp.created_at) = ? group by c.nombre_crimen', array(date('Y') - 1));


        /* Estadística de la cantidad de crimenes por lugares */

        $crimenes_ubicacion = DB::select('select upper(u.nombre_ubicacion) as ubicacion, count(cp.crime_id) as total from crimes c, crime_person cp, ubications u where c.id = cp.crime_id and cp.ubication_id = u.id and year(cp.created_at) = ? group by u.nombre_ubicacion', array(date('Y') - 1));


        /* Ultimas personas apresadas */

        $reclusos = DB::select("select p.id, upper(p.nombres) as nombre, upper(p.apellidos) as apellido, r.years, upper(c.nombre_crimen) as crimen, upper(ps.nombre_prision) as prision, date_format(r.created_at, '%d-%m-%Y') created_at from people p, recluses r, crime_person cp, crimes c, prisions ps where c.id = cp.crime_id and cp.person_id = p.id and p.id = r.person_id and r.prision_id = ps.id and r.`status` = 'p' limit 10");


        /* Cantidad de crimenes agrupados por tipo de arma */
        $crimenes_arma = DB::select('select upper(w.nombre_arma) as arma, count(cp.crime_id) as total from crimes c, crime_person cp, weapons w where c.id = cp.crime_id and cp.weapon_id = w.id and year(cp.created_at) = ? group by w.nombre_arma',  array(date('Y') - 1));


        /* Personas peligrosas - Ultimas alertas */
        $alerts = DangerPerson::with('person')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->toArray();


        /* Retornando los valores a la vista */

        return view('admin.dashboard', [
        	'cant_reclusos' => $cant_reclusos,
        	'cant_accidentes' => $cant_accidentes,
        	'cant_incidentes' => $cant_incidentes,
            'cant_crimenes' => $cant_crimenes,
            'crimenes' => $crimenes,
            'reclusos' => $reclusos,
            'crimenes_ubicacion' => $crimenes_ubicacion,
            'crimenes_arma' => $crimenes_arma,
            'alerts' => $alerts,
            'prisioneros_yyear' => $prisioneros_yyear
        ]);
    }
}
