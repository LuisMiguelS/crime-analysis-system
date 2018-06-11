<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Vehicle;
use App\VehicleTransfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    public function index ()
    {
        $years = DB::select('select year(va.created_at) yyear from vehicle_accidents va group by (yyear)');

        return view('admin.accidents.general_consulting', [
            'years' => $years
        ]);
    }

    public static function consultigVehicleStatus ()
    {
    	return view('admin.vehicles.consulting_vehicle_status');
    }

    public function generateData (Request $request)
    {
        // meses del año en _ES
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

        // cantidad de accidentes por meses
        $mes_accidente = DB::select('select count(month(va.created_at)) total, month(va.created_at) mes from vehicle_accidents va where year(va.created_at) = ? group by mes', array($request->year));

        // obtiene las ubicaciones y la cant. de accidentes
        $ubications = DB::select('select upper(u.nombre_ubicacion) ubicacion, count(va.id) as total, u.latitud, u.longitud from vehicle_accidents va, ubications u where va.ubication_id = u.id and year(va.created_at) = ? group by u.id', array($request->year));

        // obtiene las ubicaciones y la cant. de accidentes
        $datos = DB::select('select v.numero_placa, upper(v.marca) marca, upper(v.modelo) modelo, v.year_fabricacion, v.color, (select count(va.vehicle_id) from vehicle_accidents va where v.id = va.vehicle_id and year(va.created_at) = ?) accidentes from vehicles v having accidentes > 0 order by 6 desc', array($request->year));


        foreach($mes_accidente as $mes)
        {
            $nombres_mes[] = $meses[$mes->mes - 1];
            $cant_accidentes[] = $mes->total;
        }

        /* Retornando la respuesta en formato JSON */

        $response = array(
            'status' => 'success',
            'nombres_mes' => $nombres_mes,
            'cant_accidentes' => $cant_accidentes,
            'ubications' => $ubications,
            'datos' => $datos
        );

        return response()->json(['data' => $response]); 
    }

    public static function vehicleStatus (Request $request)
    {
        $propietario_anterior = true;

        $vehicle = Vehicle::with('person', 'vehicleIncidents', 'vehicleAccidents')->where('numero_placa', '=', $request->placa)
            ->first()
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

    	return view('admin.vehicles.vehicle_status', [
            'vehicle' => $vehicle,
            'propietario' => $propietario,
            'propietario_anterior' => $propietario_anterior
        ]);
    }
}
