<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Espacio;

class GestionSalas extends Controller
{
    // Crear una sala/espacio nuevos en tabla espacios
    public function gestionEspacio(Request $respuesta)
    {
        try {
            // Validación de los campos
            $validar = $respuesta->validate([
                'nombre_teatro' => 'required|string|max:255',
                'localidad' => 'required|string|max:255',
                'codigo_postal' => 'required|string|max:5',
                'direccion' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'telefono' => 'required|digits:9',
                'nombre_sala' => 'required|string|max:255',
                'equipamiento' => 'required|string|max:2000',
                'tipo_sala' => 'required|string|max:50',
                'aforo' => 'required|integer|min:1|max:1000',
            ]);
            // dd($validar);
            Log::info('Datos enviados al registrar: ', $validar);

            // Crear nuevo usuario
            $usuario = new Espacio();
            $usuario->nombre = $validar['nombre_teatro'];
            $usuario->localidad = $validar['localidad'];
            $usuario->codigopostal = $validar['codigo_postal'];
            $usuario->direccion = $validar['direccion'];
            $usuario->email = $validar['email'];
            $usuario->telefono = $validar['telefono'];
            $usuario->equipamiento = $validar['equipamiento'];
            $usuario->nombre_sala = $validar['nombre_sala'];
            $usuario->tipo = $validar['tipo_sala'];
            $usuario->capacidad = $validar['aforo'];
            $usuario->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('gestion-salas')->with('correcto', 'Registro de sala correcto');
        } catch (\Exception $ex) {
            // Manejo de otras excepciones
            Log::error('Error al registrar en la base de datos: ' . $ex->getMessage(), [
                'exception' => $ex
            ]);
            return redirect()->route('gestion-salas')->with('error', 'Error al registrar sala');
        }
    }

    public function buscarEspacios(Request $request)
    {

        $espacio = Espacio::query();

        // Verificar si al menos uno de los filtros está lleno
        $filtroAplicado = false;

        // Si la localidad está llena, aplicar filtro
        if ($request->filled('localidad')) {
            $espacio->where('localidad', 'like', '%' . $request->localidad . '%');
            $filtroAplicado = true;
        }

        if ($request->filled('nombre')) {
            $espacio->where('nombre', 'like', '%' . $request->nombre . '%');
            $filtroAplicado = true;
        }

        // Obtener resultados dependiendo si hay filtros o no
        if (!$filtroAplicado) {
            $espacios = collect(); // o puedes usar Espacio::limit(1)->get() si quieres mostrar algo por defecto
        } else {
            $espacios = $espacio->limit(10)->get();
        }

        return view('nuevas-reservas', compact('espacios'));
    }
}
