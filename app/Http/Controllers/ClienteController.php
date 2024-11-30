<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

    // Mostrar formulario para crear un nuevo cliente
    public function create()
    {
        return view('admin.clientes.create');
    }

    // Almacenar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    // Mostrar los detalles de un cliente
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.show', compact('cliente'));
    }

    // Mostrar formulario para editar un cliente
public function edit($id)
{
    // Buscar el cliente por su ID
    $cliente = Cliente::findOrFail($id);

    // Retornar la vista de edición con los datos del cliente
    return view('admin.clientes.edit', compact('cliente'));
}

// Actualizar un cliente existente
public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:100',
        'telefono' => 'required|string|max:15',
    ]);

    // Buscar el cliente y actualizar sus datos
    $cliente = Cliente::findOrFail($id);
    $cliente->update($request->all());

    // Redirigir con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
}

// Eliminar un cliente
public function destroy($id)
{
    // Buscar el cliente por su ID
    $cliente = Cliente::findOrFail($id);

    // Eliminar el cliente
    $cliente->delete();

    // Redirigir de vuelta a la lista de clientes con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
}


}
