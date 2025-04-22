<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Comentar bloque if si quieres deshabilitar las restricciones de las páginas

        if (session('id_rol') != 1) {
            return redirect('/');
        }

        return $next($request);
    }
}
