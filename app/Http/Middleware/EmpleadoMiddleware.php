<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmpleadoMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de empleado
        if (Auth::check() && Auth::user()->role_id === 2) { // Cambia "2" por el ID correspondiente al rol de empleado
            return $next($request);
        }

        // Redirige al dashboard si no tiene permisos
        return redirect('/dashboard')->with('error', 'No tienes acceso a esta sección.');
    }
}
