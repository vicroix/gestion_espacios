@extends("layouts.plantilla")
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet" />
@vite('resources/css/app.css')

@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/busquedas-salas -->

@section("main")
<main class="m-4">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Nuevas Reservas</h3>
        </div>
    </div>

    @if (!is_null($espacio ?? null))
    <section class="flex items-start justify-center gap-9">
        <!--Mapa interactivo-->
        <div class="lg:w-[500px] lg:h-[400px] shadow">
            <div id="contenedor-del-mapa" class="absolute lg:w-[500px] lg:h-[400px]" data-direccion="{{ $espacio->direccion }}"></div>
        </div>
        <div class="flex flex-col gap-6">
            <form action="{{ route('reservar') }}" method="POST" class="flex flex-col gap-8">
                @csrf
                <input type="hidden" name="nombre_teatro" value="{{ $espacio->nombre }}">
                <input type="hidden" name="localidad" value="{{ $espacio->localidad }}">
                <input type="hidden" name="codigo_postal" value="{{ $espacio->codigopostal }}">
                <input type="hidden" name="direccion" value="{{ $espacio->direccion }}">
                <input type="hidden" name="id_espacio" value="{{ $espacio->idespacios }}">
                <!-- Información de espacio seleccionado de "nuevas-reservas.blade.php" -->
                <div>
                    <h4 class="text-lg font-semibold text-[#990000]">{{ $espacio->nombre }}</h4>
                    <p>Sala: {{ $espacio->nombre_sala }}</p>
                    <p>Localidad: {{ $espacio->localidad }}</p>
                    <p>Dirección: {{ $espacio->direccion }}</p>
                    <p>Tel: {{ $espacio->telefono }}</p>
                    <p>Tipo: {{ $espacio->tipo }}</p>
                    <p>Capacidad: {{ $espacio->capacidad }}</p>
                    <p>Equipamiento: {{ $espacio->equipamiento }}</p>
                </div>
                <!-- Contenedor selección FECHA y HORA -->
                <div>
                    <h4 class="py-2">Selecciona hora y día:</h4>
                    <input type="date" name="fecha" id="fecha" min="{{ date('Y-m-d') }}" class="inputs-text">
                    <input type="time" name="hora" id="hora" class="inputs-text">
                </div>
                <!-- Contenedor BOTONES -->
                <div class="flex gap-4 ml-4 items-center">
                    <div>
                        <a href="{{ route('buscar-sala',['id'=> $espacio->idespacios] )}}" class="inline-flex items-center button-reserva-a-filtro">
                            <svg class="mr-2 w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                            </svg>
                        </a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="button-confirmar-reserva w-[61.97]">
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 16l2 2 4-4" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @endif
        </div>
        </div>
    </section>
    @else
    <p class="text-center">No seleccionaste un espacio en busqueda de salas: <a href="{{ url('buscar-sala') }}" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
    @endif

</main>
@vite('resources/js/nuevas-reservas.js')
<script src="{{ asset('mapa/mapa.js') }}"></script>
@endsection
