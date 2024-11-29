<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmpleadoMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role->nombre === 'empleado') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'No tienes acceso a esta sección');
    }
}
