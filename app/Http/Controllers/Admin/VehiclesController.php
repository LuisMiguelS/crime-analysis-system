<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehiclesController extends Controller
{
    public static function consultigVehicleStatus ()
    {
    	return view('admin.vehicles.consulting_vehicle_status');
    }

    public static function vehicleStatus (Request $request)
    {
    	return 'holaa gente!!';

    	// return view('admin.vehicles.vehicle_status');
    }


    public function googleLineChart()
    {

        $visitor = DB::table('danger_people')

            ->select(
                DB::raw("year(created_at) as year"),
                DB::raw("SUM(person_id) as total_click"),
                DB::raw("SUM(id) as total_viewer"))
            ->groupBy(DB::raw("year(created_at)"))
            ->get();

        $result[] = ['Year','Click','Viewer'];

        foreach ($visitor as $key => $value)
        {
            $result[++$key] = [$value->year, (int)$value->total_click, (int)$value->total_viewer];
        }

        return view('admin.vehicles.vehicle_status')
            ->with('visitor',json_encode($result));
    }
}
