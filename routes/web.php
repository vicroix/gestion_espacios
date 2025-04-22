<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
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

Route::get('/', [App\Http\Controllers\PaginasController::class, 'inicio'])->name('inicio');
Route::get('/proximos-eventos', [App\Http\Controllers\PaginasController::class, 'proximosEventos'])->name('proximos-eventos');
Route::get('/pago', [App\Http\Controllers\PaginasController::class, 'pago'])->name('pago');
Route::get('/inicio-sesion', [App\Http\Controllers\PaginasController::class, 'inicioSesion'])->name('inicio-sesion');
Route::get('/gestion-reservas', [App\Http\Controllers\PaginasController::class, 'gestionReservas'])->name('gestion-reservas');
Route::get('/form-registro', [App\Http\Controllers\PaginasController::class, 'formRegistro'])->name('form-registro');
Route::get('/faq', [App\Http\Controllers\PaginasController::class, 'faq'])->name('faq');
Route::get('/busquedas-salas', [App\Http\Controllers\PaginasController::class, 'busquedasSalas'])->name('busquedas-salas');
//Rutas con acceso de solo Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/nuevas-reservas', [App\Http\Controllers\PaginasController::class, 'nuevasReservas'])->name('nuevas-reservas');
    Route::get('/modificar-salas', [App\Http\Controllers\PaginasController::class, 'modificarSalas'])->name('modificar-salas');
    Route::get('/gestion-salas', [App\Http\Controllers\PaginasController::class, 'gestionSalas'])->name('gestion-salas');
});
//Rutas con método POST para datos sensibles
Route::post('/iniciar-sesion', [AuthController::class, 'login'])->name('login');
Route::post('form-registro', action: [AuthController::class, 'registro'])->name('registro');

//Cierra sesión del usuario
Route::get('/cerrar-sesion', function () {
    session()->flush(); // Borra toda la sesión
    return redirect('/');
})->name('salir');
