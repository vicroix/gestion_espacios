<?php

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GestionReservas;
use App\Http\Controllers\GestionSalas;

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

//Rutas de acceso
Route::get('/', [App\Http\Controllers\PaginasController::class, 'inicio'])->name('inicio');
Route::get('/proximos-eventos', [App\Http\Controllers\PaginasController::class, 'proximosEventos'])->name('proximos-eventos');
Route::get('/pago', [App\Http\Controllers\PaginasController::class, 'pago'])->name('pago');
Route::get('/inicio-sesion', [App\Http\Controllers\PaginasController::class, 'inicioSesion'])->name('inicio-sesion');
Route::get('/form-registro', [App\Http\Controllers\PaginasController::class, 'formRegistro'])->name('form-registro');
Route::get('/faq', [App\Http\Controllers\PaginasController::class, 'faq'])->name('faq');
Route::get('/busquedas-salas', [App\Http\Controllers\PaginasController::class, 'busquedasSalas'])->name('busquedas-salas');

//Rutas solo Admin
Route::middleware(['admin'])->group(function () {
    //Rutas de acceso
    Route::get('/modificar-salas', [App\Http\Controllers\PaginasController::class, 'modificarSalas'])->name('modificar-salas');
    //Ruta al view "gestion-reservas.blade.php"
    Route::get('/gestion-salas', [App\Http\Controllers\PaginasController::class, 'gestionSalas'])->name('gestion-salas');
    //Ruta encargada de registrar los espacios por parte del Admin en view "gestion-reservas.blade.php"
    Route::post('gestion-espacio', action: [GestionSalas::class, 'gestionEspacio'])->name('gestion-espacio');
});
//Rutas profe, pero Admin también
Route::middleware(['profe'])->group(function () {
    //Ruta al view "gestion-reservas.blade.php" para mostrar las reservas automáticamente el acceder a ella
    Route::get('buscar-reservas', action: [GestionReservas::class, 'buscarReservas'])->name('buscar-reservas');
    //Ruta encargada de filtrar y buscar todos los espacios de la BBDD al cargar la view "nuevas-reservas.blade.php"
    Route::get('/buscar-sala', [App\Http\Controllers\GestionSalas::class, 'buscarEspacios'])->name('buscar-sala');
    //Ruta para envia el id de espacio desde "nuevas-reservas.blade.php" a "busquedas-salas.blade.php"
    Route::get('/detalle-espacio/{id}', [App\Http\Controllers\GestionSalas::class, 'detalleEspacio'])->name('detalle-espacio');
    //Ruta encargada de realizar reserva desde "busqueas-salas.blade.php"
    Route::post('reservar', action: [GestionReservas::class, 'realizarReserva'])->name('reservar');
    //Ruta que permite editar y actualizar las reservas
    Route::get('/editar-reserva/{id}', [GestionReservas::class, 'editarReserva'])->name('editar-reserva');
    Route::post('/actualizar-reserva/{id}', [GestionReservas::class, 'actualizarReserva'])->name('actualizar-reserva');
    //Ruta que borra las reservas
    Route::delete('/eliminar-reserva/{id}', [GestionReservas::class, 'eliminarReserva'])->name('eliminar-reserva');
});

//Rutas para autentificación
Route::post('/iniciar-sesion', [AuthController::class, 'login'])->name('login');
Route::post('form-registro', action: [AuthController::class, 'registro'])->name('registro');

//Cierra sesión del usuario
Route::get('/cerrar-sesion', function () {
    session()->flush(); // Borra toda la sesión
    return redirect('/');
})->name('salir');
