<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        // Verificar si el usuario está autenticado y si su rol coincide
        if (Auth::check() && Auth::user()->role->nombre === $role) {
            return $next($request);
        }

        // Si el usuario no tiene permiso, devolver error 403
        abort(403, 'No tienes permiso para acceder a esta página.');
    }
}
