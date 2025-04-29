@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">EDITAR RESERVAS</h3>
    </div>
    <form method="POST" action="{{ route('actualizar-reserva', ['id' => $reserva->idreservas]) }}" class="flex items-center gap-3">
        @csrf
        <label>Fecha:</label>
        <input type="date" name="fecha" value="{{ $reserva->fecha }}" required class="inputs-text">

        <label>Hora inicio:</label>
        <input type="time" name="hora" value="{{ $reserva->hora }}" required class="inputs-text">

        <!-- <label>Hora fin:</label>
        <input type="time" name="hora_fin" value="{{ $reserva->hora_fin }}" required> -->

        <!-- Puedes agregar más campos si quieres editar más cosas -->

        <button type="submit" class="button-primary-auto">Actualizar Reserva</button>
    </form>
</main>

@endsection
