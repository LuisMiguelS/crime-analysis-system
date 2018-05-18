<?php

namespace App\Http\Controllers;

use App\{User, BadUser };
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AlertBadUserNotification;

class BadUserController extends Controller
{
    public function store()
    {
  
    	$bad_user = BadUser::create(request()->all());

    	$users = User::all();  // $user->notify(new AlertBadUserNotification($bad_user))

    	Notification::send($users, new AlertBadUserNotification($bad_user));

    	return redirect('/');
    }
}
