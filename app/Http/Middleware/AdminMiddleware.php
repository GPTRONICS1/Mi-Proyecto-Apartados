<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->nombre === 'admin') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'No tienes acceso a esta sección');
    }
}
