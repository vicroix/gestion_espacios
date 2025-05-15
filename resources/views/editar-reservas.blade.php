@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')


<title>?</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<div class="flex flex-col w-full items-center gap-4 lg:gap-8">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">Editar reservas</h3>
        </div>
    </div>
    <div class="flex flex-col hover:bg-slate-100/85 gap-4 rounded-xl shadow transition duration-250 ease-in-out hover:shadow-lg p-3 border-t-4 border-[--color-primario]">
        <h3 class="text-center text-[--color-primario]">{{ $reserva->nombre }}</h3>
        <form method="POST" action="{{ route('actualizar-reserva', ['id' => $reserva->idreservas]) }}" class="flex flex-col">
            @csrf
            <div class="flex md:flex md:flex-row items-end gap-3">
                <input type="hidden" name="id_espacio" value="{{ $reserva->id_espacio }}">
                <div class="flex flex-col">
                    <label>Fecha:</label>
                    <input type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" value="{{ \Carbon\Carbon::parse($reserva->fecha)->format('Y-m-d') }}" required class="inputs-text border border-[--color-secundario]">
                </div>
                <div class="flex gap-3">
                    <div class="flex flex-col">
                        <label>Hora inicio:</label>
                        <input type="time" id="horaInicio" name="hora" value="{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}" required class="inputs-text border border-[--color-secundario]">
                    </div>
                    <div class="flex flex-col">
                        <label>Hora fin:</label>
                        <input type="time" id="horaFin" name="hora_fin" value="{{ \Carbon\Carbon::parse($reserva->hora_fin)->format('H:i')}}" required class="inputs-text border border-[--color-secundario]">
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center gap-3 mt-6">
                <!--Botón de confirmar-->
                <button type="submit" class="button-primary-auto w-[55.95] h-[40] flex justify-center items-center" title="Confirmar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 376 384"><path fill="currentColor" d="M119 282L346 55l29 30l-256 256L0 222l30-30z"/></svg>
                </button>
                <!--Botón de volver-->
                <a href="{{ url('buscar-reservas') }}" class="inline-flex w-[61.97] h-[37.6] justify-center items-center button-reserva-a-filtro" title="Volver">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                        <path fill="currentColor"
                            d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                    </svg>
                </a>
            </div>
        </form>
    </div>
    @if (session('error'))
    <p class="text-red-500">{{ session('error') }}</p>
    @endif
</div>
@vite('resources/js/nuevas-reservas.js')
@endsection
