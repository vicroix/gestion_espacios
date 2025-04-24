<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Espacio;

class AuthController extends Controller
{
    public function login(Request $respuesta)
    {
        $usuario = Usuario::with('rol')->where('email', $respuesta->email)->first();
        if ($usuario && password_verify($respuesta->password, $usuario->password)) {
            session([
                'idusuarios' => $usuario->idusuarios,
                'usuario' => $usuario->usuario,
                'id_rol' => $usuario->id_rol,
                'nombre_rol' => $usuario->rol->nombre_rol
            ]);

            return redirect('/');
        } else {
            return redirect('/inicio-sesion')->with('error', 'Contraseña o email incorrectos');
        }
    }
    public function registro(Request $respuesta)
    {
        try {
            // Validación de los campos
            $validar = $respuesta->validate([
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'telefono' => 'required|string|max:15',
                'email' => 'required|email|unique:usuarios,email',
                'usuario' => 'required|string|max:255|unique:usuarios,usuario',
                'password' => 'required|string',
            ]);
            Log::info('Datos enviados al registrar: ', $validar);

            // Crear nuevo usuario
            $usuario = new Usuario();
            $usuario->nombre = $validar['nombre'];
            $usuario->apellidos = $validar['apellidos'];
            $usuario->telefono = $validar['telefono'];
            $usuario->email = $validar['email'];
            $usuario->usuario = $validar['usuario'];
            $usuario->password = bcrypt($validar['password']);
            $usuario->save();

            // Redirigir con mensaje de éxito
            return redirect()->route('form-registro')->with('success', 'Usuario registrado con éxito');
        } catch (\Exception $e) {
            // Manejo de otras excepciones
            return redirect()->route('form-registro')->with('error', 'Error al registrar. Posible usuario o email ya existentes.');
        }
    }
    // Crear una sala/espacio nuevos en tabla espacios
    public function gestionEspacio(Request $respuesta)
    {
        try {
            // Validación de los campos
            $validar = $respuesta->validate([
                'nombre_teatro' => 'required|string|max:255',
                'localidad' => 'required|string|max:255',
                'codigo_postal' => 'required|digits:5',
                'direccion' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'telefono' => 'required|digits:9',
                'nombre_sala' => 'required|string|max:255',
                'equipamiento' => 'required|string|max:1200',
                'tipo_sala' => 'required|string|max:255',
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

}
