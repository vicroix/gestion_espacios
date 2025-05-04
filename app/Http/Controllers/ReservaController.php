<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    public function obtenerEventos()
{
    $reservas = DB::table('reservas')
        ->join('espacios', 'reservas.id_espacio', '=', 'espacios.idespacios')
        ->select(
            'reservas.idreservas as id',
            'espacios.nombre as title',
            'reservas.fecha as start',
            'reservas.localidad as localidad',
            'reservas.direccion as direccion',
            'reservas.hora as hora',
            'reservas.hora_fin as horaFin',
            'espacios.nombre_sala as sala',
        )
        ->get();
        Log::info('Eventos obtenidos:', $reservas->toArray());
    return response()->json($reservas);
}
}
