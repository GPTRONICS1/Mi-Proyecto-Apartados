@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
    <p class="mb-3">Tu rol es: {{ Auth::user()->role->nombre }}</p>

    <script>
        // Redirigir al usuario dependiendo de su rol
        window.onload = function() {
            let userRole = '{{ Auth::user()->role->nombre }}';

            if (userRole === 'admin') {
                window.location.href = '{{ route('admin.dashboard') }}';
            } else if (userRole === 'empleado') {
                window.location.href = '{{ route('empleado.dashboard') }}';
            } else {
                alert('No tienes un rol asignado.');
            }
        };
    </script>
</div>
@endsection
