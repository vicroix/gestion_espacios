@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Editar reservas</h3>
        </div>
    </div>
    <form method="POST" action="{{ route('actualizar-reserva', ['id' => $reserva->idreservas]) }}" class="flex items-center gap-3">
        @csrf
        <label>Fecha:</label>
        <input type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" value="{{ $reserva->fecha }}" required class="inputs-text">

        <label>Hora inicio:</label>
        <input type="time" id="hora" name="hora" value="{{ $reserva->hora }}" required class="inputs-text">

        <!-- <label>Hora fin:</label>
        <input type="time" name="hora_fin" value="{{ $reserva->hora_fin }}" required> -->

        <!-- Puedes agregar más campos si quieres editar más cosas -->

        <button type="submit" class="button-primary-auto">Actualizar Reserva</button>
    </form>
</main>
@vite('resources/js/nuevas-reservas.js')
@endsection
