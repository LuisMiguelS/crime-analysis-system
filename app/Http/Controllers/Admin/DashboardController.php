<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Recluse;
use App\CartAccident;
use App\VehicleIncident;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public static function index()
    {
        $cant_crimenes = DB::select('select count(id) cant from crime_person');
    	$cant_reclusos = Recluse::count();
    	$cant_accidentes = CartAccident::count();
    	$cant_incidentes = VehicleIncident::count();

        return view('admin.dashboard', [
        	'cant_reclusos' => $cant_reclusos,
        	'cant_accidentes' => $cant_accidentes,
        	'cant_incidentes' => $cant_incidentes,
            'cant_crimenes' => $cant_crimenes
        ]);
    }
}
