<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Espacio;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GestionSalas extends Controller
{
    // Añade espacios en al base de datos
    public function gestionEspacio(Request $respuesta)
    {
        try {
            // Validación de los campos
            $validar = Validator::make($respuesta->all(), [
                'nombre_teatro' => 'required|string|max:100',
                'localidad' => 'required|string|max:100',
                'codigo_postal' => 'required|string|max:5',
                'direccion' => 'required|string|max:100',
                'email' => 'required|string|max:255',
                'telefono' => 'nullable|string|max:9',
                'nombre_sala' => 'nullable|string|max:100',
                'equipamiento' => 'nullable|string|max:255',
                'tipo_sala' => 'required|string|max:6',
                'aforo' => 'required|integer|min:1|max:100',
                'fotos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:12248',
            ]);
            Log::error('Errores de validación:', $validar->errors()->toArray());
            if ($validar->fails()) {
                return redirect()->route('gestion-salas', ['mostrarFiltroEspacios' => false])
                    ->withErrors($validar)
                    ->withInput()
                    ->with('error', 'Datos incorrectos.');
            }

            $validar = $validar->validated();
            Log::info('Datos enviados al registrar: ', $validar);

            // Guardamos los datos en la BBDD
            $espacio = new Espacio();
            $espacio->nombre = $validar['nombre_teatro'];
            $espacio->localidad = $validar['localidad'];
            $espacio->codigopostal = $validar['codigo_postal'];
            $espacio->direccion = $validar['direccion'];
            $espacio->email = $validar['email'];
            $espacio->telefono = $validar['telefono'];
            $espacio->equipamiento = $validar['equipamiento'];
            $espacio->nombre_sala = $validar['nombre_sala'];
            $espacio->tipo = $validar['tipo_sala'];
            $espacio->capacidad = $validar['aforo'];
            $espacio->save();

            // Si el espacio se guardó correctamente y hay fotos, las subimos
            if ($respuesta->hasFile('fotos')) {
                foreach ($respuesta->file('fotos') as $fotoArchivo) {
                    $ruta = $fotoArchivo->store('img', 'public');

                    $foto = new Foto();
                    $foto->espacio_id = $espacio->idespacios;
                    $foto->ruta = $ruta;
                    $foto->save();
                }
            }

            return redirect()->route('gestion-salas', ['mostrarFiltroEspacios' => false])->with('correcto', $espacio->nombre);
        } catch (\Exception $ex) {
            Log::error('Error al registrar en la base de datos: ' . $ex->getMessage(), [
                'exception' => $ex
            ]);
            return redirect()->route('gestion-salas', ['mostrarFiltroEspacios' => false])->with('error', 'Error, has introducido algún dato duplicado en la base de datos');
        }
    }

    // Función para buscar los resultados de los filtros del view "gestion-salas.blade.php"
    public function buscarEspacios(Request $respuesta)
    {
        $query = Espacio::query();
        $mostrarFiltroEspacios = filter_var($respuesta->query('mostrarFiltroEspacios', true), FILTER_VALIDATE_BOOLEAN);

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


        return view('gestion-salas', compact('espacios', 'mostrarFiltroEspacios')); // *** CAMBIAR LUEGO LA VIEW A gestion-salas ***
    }
    // Función para buscar los resultados de los filtros del view "modificar-salas.blade.php"
    public function modificarSalas(Request $respuesta)
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

        return view('modificar-salas', compact('espacios'));
    }

    // Función para enviar por id una sala selecionada desde el botón Ver de la view "modificar-salas.blade.php"
    // a la view de "Editar-salas.blade.php"
    public function enviarEditarSalas($id)
    {
        $espacio = Espacio::findOrFail($id);
        // dd($espacio);
        return view('editar-salas', compact('espacio'));
    }

    // Función para actualizar una reserva existente desde el view "editar-reservas.blade.php" y redirige a
    // el view "editar-salas.blade.php"
    public function editarSalas(Request $request, $id)
    {
        $editarespacio = Espacio::findOrFail($id);
        // dd($request->input('fotos_borrar'));
        $validar = Validator::make($request->all(), [
            'nombre_teatro' => 'required|string|max:100',
            'localidad'     => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:5',
            'direccion'     => 'required|string|max:100',
            'email'         => 'required|email|max:255',
            'telefono'      => 'required|string|max:9',
            'nombre_sala'   => 'required|string|max:100',
            'equipamiento'  => 'required|string|max:255',
            'tipo_sala'     => 'required|in:Obra,Ensayo',
            'aforo'         => 'required|integer|min:1|max:100',
            'fotos.*'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:12248',
            'fotos_borrar' => 'sometimes|array',
            'fotos_borrar.*' => 'nullable|integer|exists:fotos,id_fotos',
        ]);

        if ($validar->fails()) {
            Log::error('Errores de validación en editarSalas():', $validar->errors()->toArray());
            return redirect()
                ->route('editar-salas', ['id' => $id])
                ->withErrors($validar)
                ->withInput()
                ->with('error', 'Datos incorrectos.');
        }

        $datos = $validar->validated();

        // Eliminar fotos seleccionadas
        if (!empty($datos['fotos_borrar'])) {
            $fotosABorrar = Foto::whereIn('id_fotos', $datos['fotos_borrar'])
            ->where('espacio_id', $editarespacio->idespacios)
            ->get();

            foreach ($fotosABorrar as $foto) {
                // dd('Ruta de la foto a eliminar: ' . $foto->ruta);
                Storage::disk('public')->delete($foto->ruta);
                $foto->delete();
            }
        }

        // Actualizar espacio
        $editarespacio->nombre       = $datos['nombre_teatro'];
        $editarespacio->localidad    = $datos['localidad'];
        $editarespacio->codigopostal = $datos['codigo_postal'];
        $editarespacio->direccion    = $datos['direccion'];
        $editarespacio->email        = $datos['email'];
        $editarespacio->telefono     = $datos['telefono'];
        $editarespacio->nombre_sala  = $datos['nombre_sala'];
        $editarespacio->tipo         = $datos['tipo_sala'];
        $editarespacio->capacidad    = $datos['aforo'];
        $editarespacio->equipamiento = $datos['equipamiento'];
        $editarespacio->save();

        // Subir fotos nuevas
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $archivo) {
                $ruta = $archivo->store('img', 'public');
                Foto::create([
                    'espacio_id' => $editarespacio->idespacios,
                    'ruta'       => $ruta,
                ]);
            }
        }

        return redirect()
            ->route('editar-salas', ['id' => $editarespacio->idespacios])
            ->with('correcto', 'Modificación actualizada correctamente.');
    }

    // Función para enviar por id un espacio selecionado desde el botón Ver de la view "gestion-salas.blade.php"
    // a la view de "reservar-sala.blade.php"
    public function detalleEspacio($id)
    {
        $espacio = Espacio::with('fotos')->findOrFail($id);
        return view('reservar-sala', compact('espacio'));
    }

    public function eliminarEspacio($id){
        $espacio = Espacio::find($id);

        if($espacio) {
            $espacio->delete();
            return redirect()->back()->with('eliminado', $espacio->nombre);
        } else {
            return redirect()->back()->with('error', 'Error al eliminar el espacio');
        }
    }
}
