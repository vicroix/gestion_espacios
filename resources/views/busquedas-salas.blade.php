@extends("layouts.plantilla")
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet" />
@vite('resources/css/app.css')

@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/busquedas-salas -->

@section("main")
<main class="mt-10">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">NUEVAS RESERVAS</h3>
        </div>
    </div>

    @if (!is_null($espacio ?? null))
    <section class="flex items-start justify-center mt-10 gap-9">
        <!--Mapa interactivo-->
        <div class="lg:w-[500px] lg:h-[400px] shadow">
            <div id="contenedor-del-mapa" class="absolute lg:w-[500px] lg:h-[400px]" data-direccion="{{ $espacio->direccion }}"></div>
        </div>
        <div class="flex flex-col gap-6">
            <form action="{{ route('reservar') }}" method="POST" class="flex flex-col gap-1">
                @csrf
                <input type="hidden" name="nombre_teatro" value="{{ $espacio->nombre }}">
                <input type="hidden" name="localidad" id="inputLocalidad" data-localidad="{{ $espacio->localidad }}" value="{{ $espacio->localidad }}">
                <input type="hidden" name="codigo_postal" id="inputCP" data-cp="{{ $espacio->codigopostal }}" value="{{ $espacio->codigopostal }}">
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
                <div class="flex flex-col gap-1">
                    <h4 class="py-2">Selecciona hora y día:</h4>
                    <div>
                        <input type="date" name="fecha" id="fecha" min="{{ date('Y-m-d') }}" class="inputs-text">
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <p>Hora Inicio: </p><input type="time" name="hora_inicio" id="horaInicio" class="inputs-text">
                        </div>
                        <div>
                            <p>Hora Fin: </p><input type="time" name="hora_fin" id="horaFin" class="inputs-text">
                        </div>
                    </div>
                </div>
                <!-- Contenedor BOTONES -->
                <div class="flex gap-4 ml-4 mt-2 items-center">
                    <div>
                        <!-- Volver a view "nuevas-reservas.blade.php" -->
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
                        <!-- Realizar reserva -->
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
            <!-- FOTOS con Alpine.js -->
            <div x-data="{ index: 0, total: {{ count($espacio->fotos) }}, fotos: [
                @foreach ($espacio->fotos as $foto)
                '{{ asset('storage/' . $foto->ruta) }}',
                @endforeach
                ], modalOpen: false }">
                <!-- Miniaturas -->
                <div class="flex space-x-2">
                    @foreach ($espacio->fotos as $foto)
                    <img src="{{ asset('storage/' . $foto->ruta) }}"
                        @click="index = {{ $loop->index }}; modalOpen = true"
                        class="w-20 h-20 object-cover rounded cursor-pointer border-2 border-gray-300 hover:border-blue-500">
                    @endforeach
                </div>

                <!-- Modal -->
                <div x-show="modalOpen"
                    class="fixed inset-0 bg-black bg-opacity-75 z-50 flex justify-center items-center"
                    x-cloak>
                    <!-- Cerrar -->
                    <span class="absolute top-4 right-8 text-white text-4xl cursor-pointer" @click="modalOpen = false">&times;</span>

                    <div class="relative">
                        <!-- No prestar atención a la advertencia, es por que usa Vue.js y el PHP lo interpreta como posible problema, pero lee la ruta correctamente -->
                        <img :src="fotos[index]" class="max-h-[800px] max-w-[800px] rounded shadow-lg cursor-pointer">

                        <!-- Botón izquierda -->
                        <button @click="index = (index === 0) ? total - 1 : index - 1"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 p-1 rounded-full shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 24">
                                <path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12t.15-.75t.45-.675l7.7-7.7q-.375-.375.888-.363t.887.388t.375.875t-.375.875z" />
                            </svg>
                        </button>

                        <!-- Botón derecha -->
                        <button @click="index = (index === total - 1) ? 0 : index + 1"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-70 p-1 rounded-full shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 24">
                                <path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>




            @if(session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
            @elseif(session('festivo'))
            <p class="text-red-500">{{ session('festivo') }}</p>
            @endif
        </div>
        </div>
    </section>
    @else
    <p class="text-center">No seleccionaste un espacio en busqueda de salas: <a href="{{ url('buscar-sala') }}" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
    @endif

</main>
@vite(['resources/js/nuevas-reservas.js', 'resources/js/busquedas-salas.js'])
<script src="{{ asset('mapa/mapa.js') }}">
</script>
@endsection
