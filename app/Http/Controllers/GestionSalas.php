<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Espacio;
use Illuminate\Support\Facades\Validator;

class GestionSalas extends Controller
{
    // Crear una sala/espacio nuevos desde la view "gestion-salas.blade.php" por el botón Añadir Sala
    public function gestionEspacio(Request $respuesta)
    {
        try {
            // Validación de los campos
            $validar = Validator::make($respuesta->all(),[
                'nombre_teatro' => 'required|string|max:100',
                'localidad' => 'required|string|max:100',
                'codigo_postal' => 'required|string|max:5',
                'direccion' => 'required|string|max:100',
                'email' => 'required|string|max:255',
                'telefono' => 'required|string|max:9',
                'nombre_sala' => 'required|string|max:100',
                'equipamiento' => 'required|string|max:255',
                'tipo_sala' => 'required|string|max:6',
                'aforo' => 'required|integer|min:1|max:100',
            ]);
            $validar = $validar->validated();
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
    // Función para buscar los resultados de los filtros del view "nuevas-reservas.blade.php"
    public function buscarEspacios(Request $respuesta)
    {
        $query = Espacio::query();

        // Localidades (checkbox)
        if ($respuesta->filled('ciudades')) {
            $query->whereIn('localidad', $respuesta->input('ciudades'));
        }

        // Localidad para filtro manual
        if ($respuesta->filled('localidad')) {
            $query->where('localidad', 'like', '%' . $respuesta->input('localidad') . '%');
        }
        // Tipo (radio)
        if ($respuesta->filled('tipo')) {
            $query->where('tipo', $respuesta->input('tipo')); // tipo = 'ensayo' o 'obra'
        }

        // Capacidad (radio)
        if ($respuesta->filled('capacidad')) {
            $query->where('capacidad', '<=', (int) $respuesta->input('capacidad'));
        }

        // Equipamiento (texto completo, opcional)
        if ($respuesta->filled('equipamiento')) {
            $query->where('equipamiento', 'like', '%' . $respuesta->input('equipamiento') . '%');
        }

        // Nombre teatro
        if ($respuesta->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $respuesta->input('nombre') . '%');
        }

        // Dirección
        if ($respuesta->filled('direccion')) {
            $query->where('direccion', 'like', '%' . $respuesta->input('direccion') . '%');
        }

        // Sala
        if ($respuesta->filled('nombre_sala')) {
            $query->where('nombre_sala', 'like', '%' . $respuesta->input('nombre_sala') . '%');
        }

        // Ejecutar query (si hay algún filtro aplicado, o traer todos si no) y en limit() pon el número de datos que quieres traer de máximo
        $espacios = $query->limit(12)->get();

        return view('nuevas-reservas', compact('espacios'));
    }
    // Función para enviar por id un espacio selecionado desde el botón Ver de la view "nuevas-reservas.blade.php"
    // a la view de "busquedas-salas.blade.php"
    public function detalleEspacio($id)
    {
        $espacio = Espacio::findOrFail($id);
        return view('busquedas-salas', compact('espacio'));
    }
}
