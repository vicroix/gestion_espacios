@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<div class="flex flex-col w-full items-center gap-4 md:lg-9 lg:gap-12">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">Editar reservas</h3>
        </div>
    </div>
    <form method="POST" action="{{ route('actualizar-reserva', ['id' => $reserva->idreservas]) }}" class="flex flex-col md:flex md:flex-row items-center gap-3">
        @csrf
        <label>Fecha:</label>
        <input type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" value="{{ $reserva->fecha }}" required class="inputs-text border border-[--color-secundario]">

        <label>Hora inicio:</label>
        <input type="time" id="horaInicio" name="hora" value="{{ $reserva->hora }}" required class="inputs-text border border-[--color-secundario]">

        <label>Hora fin:</label>
        <input type="time" id="horaFin" name="hora_fin" value="{{ $reserva->hora_fin }}" required class="inputs-text border border-[--color-secundario]">

        <input type="hidden" name="id_espacio" value="{{ $reserva->id_espacio }}">

        <button type="submit" class="button-primary-auto">Actualizar Reserva</button>
    </form>
    @if (session('error'))
    <p class="text-red-500">{{ session('error') }}</p>
    @endif
</div>
@vite('resources/js/nuevas-reservas.js')
@endsection
