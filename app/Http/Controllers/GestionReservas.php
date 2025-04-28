<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Reserva;

class GestionReservas extends Controller
{
    public function realizarReserva(Request $respuesta)
    {
        try {
            $validar = $respuesta->validate([
                'fecha' => 'required|date|after_or_equal:today',
                'hora' => 'required|date_format:H:i',
                'id_espacio' => 'required|integer',
                'LocalidadTeatro' => 'required|string',
                'codigoPostal' => 'required|string|max:5',
            ]);
            $idUsuario = session('idusuarios');
            //Creo la reserva
            $reserva = new Reserva();
            $reserva->fecha = $validar['fecha'];
            $reserva->hora = $validar['hora'];
            $reserva->localidad = $validar['LocalidadTeatro'];
            $reserva->codigopostal = $validar['codigoPostal'];
            $reserva->id_usuario = $idUsuario;
            $reserva->id_espacio = $validar['id_espacio'];
            $reserva->save();

            return redirect()->route('nuevas-reservas')->with('correcto', '¡Reserva realizada correctamente!');
        } catch (\Exception $ex) {
            Log::error('Error al registrar en la base de datos: ' . $ex->getMessage(), [
                'exception' => $ex
            ]);
            return redirect()->route('nuevas-reservas')->with('error', 'Error al reservar');
        }
    }
}
