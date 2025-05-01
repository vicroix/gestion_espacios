<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;

class GestionReservas extends Controller
{
    public function realizarReserva(Request $respuesta)
    {
        // dd($respuesta->all());
        $validator = Validator::make($respuesta->all(), [
            'nombre_teatro' => 'required|string|max:100',
            'localidad' => 'required|string',
            'codigo_postal' => 'required|string|max:5',
            'direccion' => 'required|string|max:255',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'id_espacio' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->route('detalle-espacio', ['id' => $respuesta->input('id_espacio')])
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Hubo un problema al realizar la reserva. Inténtalo de nuevo.');
        }
        $validar = $validator->validated();
        try {
            $idUsuario = session('idusuarios');

            // Creo la reserva
            $reserva = new Reserva();
            $reserva->nombre = $validar['nombre_teatro'];
            $reserva->localidad = $validar['localidad'];
            $reserva->codigopostal = $validar['codigo_postal'];
            $reserva->direccion = $validar['direccion'];
            $reserva->fecha = $validar['fecha'];
            $reserva->hora = $validar['hora'];
            $reserva->id_espacio = $validar['id_espacio'];
            $reserva->id_usuario = $idUsuario;
            $reserva->save();
            // dd($reserva);
            Log::info('Reserva:', ['reserva' => $reserva]);
            return redirect()->route('buscar-reservas')->with('correcto', 'Reserva realizada correctamente.');
        } catch (\Exception $ex) {
            Log::error('Error al registrar en la base de datos: ' . $ex->getMessage(), [
                'exception' => $ex
            ]);
            // Si hay un error en la BD, redirige a detalle-espacio
            return redirect()->route('detalle-espacio', ['id' => $validar['id_espacio']])
                ->with('error', 'Hubo un problema al realizar la reserva. Inténtalo de nuevo.');
        }
    }
    // función que busca si tiene reservas realizadas el usuario en view "gestion-reservas.blade.php"
    public function buscarReservas(Request $respuesta)
    {
        $id_usuario = session('idusuarios');
        $reservas = Reserva::where('id_usuario', $id_usuario)->get();


        return view('gestion-reservas', compact('reservas'));
    }
    // Función que permite editar una reserva existente en view "gestion-reservas.blade.php" con botón Editar, y envía
    // el id al view "editar-reservas.blade.php"
    public function editarReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('editar-reservas', compact('reserva'));
    }
    // Función para actualizar una reserva existente desde el view "editar-reservas.blade.php" y redirige a
    // el view "gestion-reservas.blade.php"
    public function actualizarReserva(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            // 'hora_fin' => 'required|date_format:H:i|after:hora', *** Añadirlo más adelante para limitar nuevas reservas sobre ese rango ***
        ]);

        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;
        // $reserva->hora_fin = $request->hora_fin; *** Añadirlo más adelante para limitar nuevas reservas sobre ese rango ***
        $reserva->save();

        return redirect()->route('buscar-reservas')->with('correcto', 'Reserva actualizada correctamente.');
    }
    //Función para eliminar una reserva desde "gestion-reservas.blade.php" con el botón Anular
    public function eliminarReserva($id)
    {
        $reserva = Reserva::find($id);

        if ($reserva) {
            $reserva->delete();
            return redirect()->back()->with('eliminado', 'Reserva eliminada correctamente.');
        } else {
            return redirect()->back()->with('error', 'Reserva no encontrada.');
        }
    }
}
