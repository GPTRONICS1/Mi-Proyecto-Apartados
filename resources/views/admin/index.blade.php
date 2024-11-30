<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Agregar Bootstrap si no está ya agregado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet"> <!-- Para iconos -->
    @yield('styles') <!-- Para incluir estilos adicionales -->
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
        <h3>Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="">
                    <i class="fa fa-tachometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('apartados.index') }}">
                    <i class="fa fa-archive"></i> Apartados
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('clientes.index') }}">
                    <i class="fa fa-users"></i> Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('productos.index') }}">
                    <i class="fa fa-cogs"></i> Productos
                </a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar Sesión
                            </x-dropdown-link>
                        </form>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="content flex-grow-1 p-4">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts') <!-- Para incluir scripts adicionales -->
</body>
</html>
