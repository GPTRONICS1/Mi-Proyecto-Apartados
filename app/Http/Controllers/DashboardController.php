<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard con las opciones de menú basadas en el rol del usuario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Inicializar el arreglo de opciones de menú
        $menuOptions = [];

        // Comprobar los roles del usuario y asignar las opciones correspondientes
        if ($user->hasRole('admin')) {
            // Opciones para el rol 'admin'
            $menuOptions = [
                'movimientos' => route('movimientos.index'),
                'apartados' => route('apartados.index'),
                'clientes' => route('clientes.index'),
            ];
        } elseif ($user->hasRole('empleado')) {
            // Opciones para el rol 'empleado'
            $menuOptions = [
                'movimientos' => route('movimientos.index'),
                'nuevo_apartado' => route('apartados.create'),
                'abonar_apartado' => route('apartados.abonar'),
            ];
        }

        // Pasar las opciones de menú a la vista
        return view('dashboard', compact('menuOptions'));
    }
}
