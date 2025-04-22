<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }
    public function proximosEventos()
    {
        return view('proximos-eventos');
    }
    public function pago()
    {
        return view('pago');
    }
    public function nuevasReservas()
    {
        return view('nuevas-reservas');
    }
    public function modificarSalas()
    {
        return view('modificar-salas');
    }
    public function inicioSesion()
    {
        return view('inicio-sesion');
    }
    public function gestionSalas()
    {
        return view('gestion-salas');
    }
    public function gestionReservas()
    {
        return view('gestion-reservas');
    }
    public function formRegistro()
    {
        return view('form-registro');
    }
    public function faq()
    {
        return view('faq');
    }
    public function busquedasSalas()
    {
        return view('busquedas-salas');
    }
}
