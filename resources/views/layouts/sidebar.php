<div class="w-64 bg-gray-800 text-white min-h-screen p-5">
    <h2 class="text-2xl font-semibold mb-6">GPtronics Dashboard</h2>
    <ul>
        <li class="mb-4">
            <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white">
                Dashboard
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white">
                Productos
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('categories.index') }}" class="text-gray-300 hover:text-white">
                Categorías
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('sales.index') }}" class="text-gray-300 hover:text-white">
                Ventas
            </a>
        </li>
        <li class="mb-4">
            <a href="{{ route('users.index') }}" class="text-gray-300 hover:text-white">
                Usuarios
            </a>
        </li>
    </ul>
</div>
