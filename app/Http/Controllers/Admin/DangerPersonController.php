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
    public function index ()
    {
        $people = Person::all();

        return view('admin.danger_person.notificate_person', [
            'people' => $people
        ]);
    }

    public function store (Request $request)
    {
    	$danger_person = DangerPerson::create([
    		'person_id' => $request->person_id,
    		'titular' => $request->titular,
    		'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in nunc sit amet quam pharetra hendrerit volutpat blandit nibh.',
    		'status' => $request->status
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
