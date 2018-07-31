<?php

namespace App\Http\Controllers;

use DB;
use App\Notice;
use App\Person;
use App\Vehicle;
use App\DangerPerson;
use App\VehicleTransfer;
use Illuminate\Http\Request;

class ApiRequests extends Controller
{
    public function criminalProfile (Request $request)
    {
    	$person = Person::where('cedula', $request->cedula)->first();

    	if(!empty($person))
    	{
            $ultima_condena = optional($person)->recluses->last();
            $prision = optional($person->recluses()->with('prision')->get()->last())->prision;
            $danger_person = optional($person)->dangerPeople->last();

	        $response = array(
                'person' => $person,
                'ultima_condena' => $ultima_condena,
                'prision' => !empty($ultima_condena) ? $prision : ''
	        );
        	
        	return response()->json(['data' => $response]);
    	}

    	else
    		return response()->json(['data' => array('message' => 'Esta persona no se encuentra registrada en la base de datos.')]);
    }

    public function dangerPersons (Request $request)
    {
    	$danger_persons = DangerPerson::with('person')
    		->paginate(10);

    	$response = array(
    		'notificaciones' => $danger_persons,
    	);

    	return response()->json(['data' => $response]);
    }

    public function vehicleProfile (Request $request)
    {
    	$propietario_anterior = true;

        $vehicle = Vehicle::with('person', 'vehicleIncidents', 'vehicleAccidents')->where('numero_placa', '=', $request->placa)
            ->first();

        if(!empty($vehicle))
        {
        	$vehicle
            	->toArray();

	        // verifica si este vehiculo ha tenido propietarios anteriores
	        $propietario = VehicleTransfer::with('person')->where('vehicle_id', '=', $vehicle['id'])
	            ->get()
	            ->toArray();

	        if(!count($propietario))
	        {
	            $propietario_anterior = false;

	            $propietario[0]['person'] = [
	                'nombres' => $vehicle['person']['nombres'],
	                'apellidos' => $vehicle['person']['apellidos'],
	                'cedula' => $vehicle['person']['cedula'],
	                'residencia' => $vehicle['person']['residencia']
	            ];
	        }

	        $response = array(
	    		'vehicle' => $vehicle,
	            'propietario' => $propietario,
	            'propietario_anterior' => $propietario_anterior
	    	);

	    	return response()->json(['data' => $response]);
        }

        else
        	return response()->json(['data' => array('message' => 'Este vehiculo no se encuentra registrado en la base de datos.')]);
    }

    public function estadisticas ()
    {
    	/* estadistica de tipos de crimenes */

    	$crimenes = DB::select('select upper(c.nombre_crimen) as crimen, count(cp.crime_id) as total from crimes c, crime_person cp where c.id = cp.crime_id and year(cp.created_at) = ? group by c.nombre_crimen', array(date('Y') - 1));

    	/* Cant. de los distintos incidentes/crimenes del año en curso */

        $cant_crimenes = DB::select('select count(id) cant from crime_person where year(created_at) = ?', array(date('Y')));
    	$cant_reclusos = DB::select('select count(id) cant from recluses where year(created_at) = ?', array(date('Y')));
    	$cant_accidentes = DB::select('select count(id) cant from vehicle_accidents where year(created_at) = ?', array(date('Y')));
    	$cant_incidentes = DB::select('select count(id) cant from vehicle_incidents where year(created_at) = ?', array(date('Y')));

    	foreach($crimenes as $crimen)
        {
            $nombre_crimen[] = $crimen->crimen;
            $totales_crimen[] = $crimen->total;
        }

    	$response = array(
    		'label_crimen' => $nombre_crimen,
    		'data_crimen' => $totales_crimen,
    		'cant_crimenes' => $cant_crimenes,
    		'cant_reclusos' => $cant_reclusos,
    		'cant_accidentes' => $cant_accidentes,
    		'cant_incidentes' => $cant_incidentes
    	);

	    return response()->json(['data' => $response]);
    }

    public function noticias ()
    {
    	$news = Notice::paginate(10);

    	$response = array(
    		'news' => $news
    	);

    	return response()->json(['data' => $response]);
    }
}
