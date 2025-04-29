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
                'direccion' => 'required|string|max:255',
                'nombreTeatro' => 'required|string|max:100',
                'fecha' => 'required|date|after_or_equal:today',
                'hora' => 'required|date_format:H:i',
                'id_espacio' => 'required|integer',
                'LocalidadTeatro' => 'required|string',
                'codigoPostal' => 'required|string|max:5',
            ]);
            $idUsuario = session('idusuarios');
            //Creo la reserva
            $reserva = new Reserva();
            $reserva->nombre = $validar['nombreTeatro'];
            $reserva->direccion = $validar['direccion'];
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

    public function buscarReservas(Request $respuesta)
    {
        $id_usuario = session('idusuarios');
        $reservas = Reserva::where('id_usuario', $id_usuario)->get();


        return view('gestion-reservas', compact('reservas'));
    }

    public function editarReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('editar-reservas', compact('reserva'));
    }

    public function actualizarReserva(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            // 'hora_fin' => 'required|date_format:H:i|after:hora',
        ]);

        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;
        // $reserva->hora_fin = $request->hora_fin;
        $reserva->save();

        return redirect()->route('buscar-reservas')->with('correcto', 'Reserva actualizada correctamente.');
    }
}
