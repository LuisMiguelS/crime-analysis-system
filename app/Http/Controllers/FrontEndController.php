<?php

namespace App\Http\Controllers;

use App\Notice;
use App\DangerPerson;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index ()
    {
    	$notices = Notice::orderBy('id', 'desc')
            ->paginate(5);

    	$danger_person = DangerPerson::with('person')
    		->where('atrapado', '')
    		->orderBy('id', 'desc')
    		->limit(5)
    		->get();

    	return view('welcome', compact('notices', 'danger_person'));
    }

    public function verArticulo ($id)
    {
    	$danger_person = DangerPerson::with('person')
    		->where('atrapado', '')
    		->orderBy('id', 'desc')
    		->limit(5)
    		->get();

    	$articulo = Notice::findOrFail($id);

    	return view('front-end.single', compact('danger_person', 'articulo'));
    }

    public function criminales ()
    {
    	$danger_person = DangerPerson::with('person')
    		->where('atrapado', '')
    		->orderBy('id', 'desc')
    		->limit(5)
    		->get();

    	$all_danger_person = DangerPerson::with('person')
    		->where('atrapado', '')
    		->orderBy('id', 'desc')
    		->paginate(5);

    	return view('front-end.criminales', compact('danger_person', 'all_danger_person'));
    }
}
