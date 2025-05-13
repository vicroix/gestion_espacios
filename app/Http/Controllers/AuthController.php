<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;

// Registro y Login de usuarios
class AuthController extends Controller
{
    public function login(Request $respuesta)
    {
        // Comprueba que el email escrito en el login coincide con el email de la BBDD
        $usuario = Usuario::with('rol')->where('email', $respuesta->email)->first();
        // Comprueba que la contraseña escrita en el login coincide con la de la BBDD
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
            // Validación de los campos del registro de usuarios
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

            return redirect()->route('form-registro')->with('success', 'Usuario registrado con éxito');
        } catch (\Exception $e) {
            Log::info('Datos enviados al registrar: ', $validar);
            return redirect()->route('form-registro')->with('error', 'Error al registrar. Posible usuario o email ya existentes.');
        }
    }
}
