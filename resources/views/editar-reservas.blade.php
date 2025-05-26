@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')


<title>Editar reserva</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<!-- Contenedor principal con img -->
<div class="flex flex-col w-full p-10 h-full items-center fondo-editar-reservas">
    <!-- Contenedor oscuro -->
    <div class="flex justify-center w-[90%] h-[90%] bg-black/45 backdrop-blur-sm">
        <!-- Modal -->
        <div class="flex flex-col md:w-[600px] md:h-[300px] bg-[--color-transparencia-cartas] p-2 border-t-4 border-[--color-primario] rounded-md backdrop-blur-sm items-center gap-4 mt-[2%] lg:gap-8">
            <div class="flex justify-center">
                <div class="titulo-main text-stroke w-full items-center flex justify-center md:w-[550px]">
                    <h3 class="text-center md:text-3xl justify-center items-center w-full h-[40px] truncate overflow-hidden whitespace-nowrap">Editar: {{ $reserva->nombre }}</h3>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 p-3 h-full">

                <form method="POST" action="{{ route('actualizar-reserva', ['id' => $reserva->idreservas]) }}" class="flex flex-col h-full mb-0 justify-between">
                    @csrf
                    <input type="hidden" id="modoEditarReserva" value="true">
                    <div class="flex flex-col items-center justify-center md:flex md:flex-row md:items-end gap-3">
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
                    <div class="flex justify-center items-end md:border-t border-[#575757] w-full md:w-auto pt-6 md:pt-4 gap-3">
                        <!--Botón de volver-->
                        <a href="{{ url('gestion-reservas') }}" class="inline-flex justify-center items-center button-reserva-a-filtro" title="Volver">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" class="icono-svg">
                                <path fill="currentColor"
                                    d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                            </svg>
                        </a>
                        <!--Botón de confirmar-->
                        <button type="submit" class="button-primary-auto  flex justify-center items-center" title="Confirmar">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 376 384" class="icono-svg">
                                <path fill="currentColor" d="M119 282L346 55l29 30l-256 256L0 222l30-30z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @endif
        </div>
    </div>
</div>
@vite('resources/js/inputsDateTime.js')
@endsection
