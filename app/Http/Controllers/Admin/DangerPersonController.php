<?php

namespace App\Http\Controllers\Admin;

// use App\Notification;
use Auth;
use Session;
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
        $alerts = DangerPerson::with('person')
            ->paginate(10);

        return view('admin.danger_person.danger_person_alerts', compact('alerts'));
    }

    public function create ()
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
            'descripcion' => '',
    		'atrapado' => '',
    		'status' => $request->status
    	]);

    	$users = User::all();
    	$person = Person::find($danger_person->person_id);

    	Notification::send($users, new NotifyDangerPerson($person, $danger_person));

    	Session::flash('success', 'La alerta se ha enviado a la base satisfactoriamente.');
        return redirect()->back();
    }

    public function notification (Request $request)
    {
    	$notifications = Auth::user()->unreadNotifications;

    	return $notifications;
    }

    public function encontrado ($id)
    {
        $danger_person = DangerPerson::find($id);

        $danger_person->atrapado = 'atrapado';
        $danger_person->save();

        Session::flash('success', 'El status de la alerta seleccionada ha sido cambiada satisfactoriamente.');
        return redirect()->back();
    }
}
