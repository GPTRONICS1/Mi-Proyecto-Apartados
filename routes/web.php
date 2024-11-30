<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ApartadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web de tu aplicación.
| Estas rutas se cargan por el RouteServiceProvider dentro del grupo "web".
|
*/

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard general (disponible para todos los usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Rutas exclusivas para ADMINISTRADOR
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        
        // Rutas de movimientos
        Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');

        // Rutas de apartados
        Route::resource('/apartados', ApartadoController::class)->except(['show']);
        
        // Rutas de clientes
        Route::resource('/clientes', ClienteController::class)->except(['show']);
        
        // Rutas de productos
        Route::resource('/productos', ProductoController::class)->except(['show']);

Route::get('/apartados', [ApartadoController::class, 'index'])->name('apartados.index');
Route::get('/apartados/create', [ApartadoController::class, 'create'])->name('apartados.create');
Route::post('/apartados', [ApartadoController::class, 'store'])->name('apartados.store');
Route::get('/apartados/{id}', [ApartadoController::class, 'show'])->name('apartados.show');
Route::resource('productos', ProductoController::class);



Route::resource('clientes', ClienteController::class);
Route::get('clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');



    });

    // Rutas exclusivas para EMPLEADO
    Route::middleware('role:empleado')->group(function () {
        Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.dashboard');

        // Rutas de movimientos
        Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');

        // Ruta para crear apartado (solo empleado puede acceder a esta)
        Route::get('/apartados/create', [ApartadoController::class, 'create'])->name('apartados.create');
        Route::post('/apartados', [ApartadoController::class, 'store'])->name('apartados.store');

        // Ruta para realizar abonos (solo empleado)
        Route::post('/apartados/abonar', [ApartadoController::class, 'abonar'])->name('apartados.abonar');
    });
});


// Rutas para el perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación (usando Laravel Breeze o Jetstream)
require __DIR__.'/auth.php';
