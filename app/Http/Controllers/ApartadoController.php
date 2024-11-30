<?php

namespace App\Http\Controllers;

use App\Models\Apartado;
use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class ApartadoController extends Controller
{
    // Mostrar todos los apartados
    public function index()
    {
        $apartados = Apartado::all();
        return view('admin.apartados.index', compact('apartados'));
    }

    // Mostrar formulario para crear un nuevo apartado
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('admin.apartados.create', compact('clientes', 'productos'));
    }

    // Almacenar un nuevo apartado
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'abono' => 'required|numeric',
            'fecha_apartado' => 'required|date',
        ]);

        Apartado::create($request->all());

        return redirect()->route('apartados.index')->with('success', 'Apartado creado exitosamente');
    }

    // Mostrar detalles de un apartado
    public function show($id)
    {
        $apartado = Apartado::findOrFail($id);
        return view('admin.apartados.show', compact('apartado'));
    }

    // Abonar a un apartado (si se requiere)
    public function abonar(Request $request, $id)
    {
        // Lógica para realizar abono a un apartado
        $apartado = Apartado::findOrFail($id);
        $apartado->abono += $request->abono;
        $apartado->save();

        return redirect()->route('apartados.index')->with('success', 'Abono realizado con éxito');
    }
}
