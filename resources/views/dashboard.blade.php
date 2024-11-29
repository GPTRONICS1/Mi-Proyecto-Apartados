@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    <p>Tu rol es: {{ Auth::user()->role->nombre }}</p>

    @if(Auth::user()->role->nombre === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Ir al Panel de Admin</a>
    @elseif(Auth::user()->role->nombre === 'empleado')
        <a href="{{ route('empleado.dashboard') }}" class="btn btn-success">Ir al Panel de Empleado</a>
    @endif
</div>
@endsection
