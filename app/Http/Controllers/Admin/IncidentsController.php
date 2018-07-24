<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\VehicleIncident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncidentsController extends Controller
{
    public static function generalConsulting ()
    {
        $years = DB::select('select year(cp.created_at) yyear from vehicle_incidents cp group by (yyear)');

        return view('admin.incidents.general_consulting', [
            'years' => $years
        ]);
    }

    public static function generateData (Request $request)
    {
    	// meses del año en _ES
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    	// cantidad de incidentes por meses
        $mes_incidente = DB::select('select count(month(vi.created_at)) total, month(vi.created_at) mes from vehicle_incidents vi where year(vi.created_at) = ? group by mes', array($request->year));

        // cantidad de incidentes por estados (robado o perdido)
        $estados_incidente = DB::select('select count(*) cant, vi.status, (select count(vii.id) from vehicle_incidents vii) as total from vehicle_incidents vi where year(vi.created_at) = ? group by vi.status', array($request->year));

        foreach($mes_incidente as $mes)
        {
            $nombres_mes[] = $meses[$mes->mes - 1];
            $cant_accidentes[] = $mes->total;
        }

        foreach($estados_incidente as $estado)
        {
            $estados[] = ucwords($estado->status);
            $totales[] = ($estado->cant / $estado->total * 100);
        }

        /* Retornando la respuesta en formato JSON */

        $response = array(
            'status' => 'success',
            'nombres_mes' => $nombres_mes,
            'cant_incidentes' => $cant_accidentes,
            'estados' => $estados,
            'totales' => $totales
        );

        return response()->json(['data' => $response]);
    }
}
