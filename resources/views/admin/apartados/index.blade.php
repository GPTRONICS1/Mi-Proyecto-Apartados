@extends('admin.index')

@section('content')
<div class="container">
    <h1>Lista de Apartados</h1>
    <a href="{{ route('apartados.create') }}" class="btn btn-primary mb-3">Nuevo Apartado</a>
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Abono</th>
                <th>Fecha de Apartado</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartados as $apartado)
                <tr>
                    <td>{{ $apartado->cliente->nombre }}</td>
                    <td>{{ $apartado->producto->nombre }}</td>
                    <td>{{ $apartado->abono }}</td>
                    <td>{{ $apartado->fecha_apartado }}</td>
                    <td>{{ $apartado->estado }}</td>
                    <td>
                        <a href="{{ route('apartados.show', $apartado->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
