@extends('admin.index')

@section('content')
<div class="container">
    <h1>Detalles del Cliente</h1>
    <ul>
        <li><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
        <li><strong>Correo:</strong> {{ $cliente->correo }}</li>
        <li><strong>Teléfono:</strong> {{ $cliente->telefono }}</li>
    </ul>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
