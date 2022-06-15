<?php

use App\Http\Controllers\AtencionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\HospitalizacionController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard', [
            'usuarios' => User::all()->count(),
            'clientes' => Cliente::all()->count(),
        ]);
    })->name('dashboard');

    Route::resource('usuarios', UsuarioController::class)->names([
        'index' => 'usuarios.index',
        'create' => 'usuarios.create',
        'store' => 'usuarios.store',
        'show' => 'usuarios.show',
        'edit' => 'usuarios.edit',
        'update' => 'usuarios.update',
        'destroy' => 'usuarios.destroy',
    ]);

    Route::resource('clientes', ClienteController::class)->names([
        'index' => 'clientes.index',
        'create' => 'clientes.create',
        'store' => 'clientes.store',
        'show' => 'clientes.show',
        'edit' => 'clientes.edit',
        'update' => 'clientes.update',
        'destroy' => 'clientes.destroy',
    ]);

    Route::resource('mascotas', MascotaController::class)->names([
        'index' => 'mascotas.index',
        'create' => 'mascotas.create',
        'store' => 'mascotas.store',
        'show' => 'mascotas.show',
        'edit' => 'mascotas.edit',
        'update' => 'mascotas.update',
        'destroy' => 'mascotas.destroy',
    ]);

    Route::resource('productos', ProductoController::class)->names([
        'index' => 'productos.index',
        'create' => 'productos.create',
        'store' => 'productos.store',
        'show' => 'productos.show',
        'edit' => 'productos.edit',
        'update' => 'productos.update',
        'destroy' => 'productos.destroy',
    ]);

    Route::resource('ventas', VentaController::class)->names([
        'index' => 'ventas.index',
        'create' => 'ventas.create',
        'store' => 'ventas.store',
        'show' => 'ventas.show',
        'edit' => 'ventas.edit',
        'update' => 'ventas.update',
        'destroy' => 'ventas.destroy',
    ]);

    Route::resource('atenciones', AtencionController::class)->names([
        'index' => 'atenciones.index',
        'create' => 'atenciones.create',
        'store' => 'atenciones.store',
        'show' => 'atenciones.show',
        'edit' => 'atenciones.edit',
        'update' => 'atenciones.update',
        'destroy' => 'atenciones.destroy',
    ]);

    Route::resource('hospitalizaciones', HospitalizacionController::class)->names([
        'index' => 'hospitalizaciones.index',
        'create' => 'hospitalizaciones.create',
        'store' => 'hospitalizaciones.store',
        'show' => 'hospitalizaciones.show',
        'edit' => 'hospitalizaciones.edit',
        'update' => 'hospitalizaciones.update',
        'destroy' => 'hospitalizaciones.destroy',
    ]);

    Route::resource('examenes', ExamenController::class)->names([
        'index' => 'examenes.index',
        'create' => 'examenes.create',
        'store' => 'examenes.store',
        'show' => 'examenes.show',
        'edit' => 'examenes.edit',
        'update' => 'examenes.update',
        'destroy' => 'examenes.destroy',
    ]);

    Route::resource('tratamientos', TratamientoController::class)->names([
        'index' => 'tratamientos.index',
        'create' => 'tratamientos.create',
        'store' => 'tratamientos.store',
        'show' => 'tratamientos.show',
        'edit' => 'tratamientos.edit',
        'update' => 'tratamientos.update',
        'destroy' => 'tratamientos.destroy',
    ]);
});
