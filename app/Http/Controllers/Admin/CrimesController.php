<?php

namespace App\Http\Controllers\Admin;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CrimesController extends Controller
{
    public static function consultigCriminalProfile ()
    {
    	return view('admin.crimes.consulting_crime_profile');
    }

    public static function criminalProfile (Request $request)
    {
    	$request->validate([
		    'cedula' => 'required'
		]);

    	$person = Person::all()->where('cedula', $request->cedula)->first();
        $ultima_condena = $person->recluses->last();

    	return view('admin.crimes.crime_profile', [
    		'person' => $person,
            'ultima_condena' => $ultima_condena
    	]);
    }
}
