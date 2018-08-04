<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->rol != 'admin')
        {
            Auth::logout();
            return redirect()->route('home');
        }

        return $next($request);
    }
}
