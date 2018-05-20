<?php

namespace App\Http\Controllers\Admin;

// use App\Notification;
use Auth;

use App\User;
use App\Person;
use App\DangerPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\NotifyDangerPerson;
use Illuminate\Support\Facades\Notification;

class DangerPersonController extends Controller
{
    public function store (Request $request)
    {
    	$danger_person = DangerPerson::create([
    		'person_id' => rand(1, 4),
    		'titular' => 'prueba',
    		'descripcion' => 'algo por aqui!',
    		'status' => 'buscado'
    	]);

    	$users = User::all();
    	$person = Person::find($danger_person->person_id);

    	Notification::send($users, new NotifyDangerPerson($person, $danger_person));

    	// Session::flash('status', 'Comment was successfully created');
        return 'funcionoo!!!';
    }

    public function notification (Request $request)
    {
    	$notifications = Auth::user()->unreadNotifications;

    	return $notifications;
    }
}
