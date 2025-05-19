@extends("layouts.plantilla")
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet" />
@vite('resources/css/app.css')

@section('title', 'Proximos eventos')

<head>
<title>Resultados</title>
<link rel="icon" type="image/png" href="/img/Logo.png">
</head>

@section("main")
<main class="mt-10">
    @if (!is_null($espacio ?? null))
    <section class="flex items-center justify-center mt-10 gap-9">

        <!-- Contenedor panel y form para transición -->
        <div class="flex items-start transition-all duration-500" id="wrapperPrincipal">

            <!-- Panel lateral izquierdo  -->
            <div id="panelContenedor" class="w-full hidden bg-white rounded-xl shadow p-4 border-t-4 border-[#990000] absolute bottom-[150px] left-0 z-40 transform translate-y-full transition-transform duration-500
            md:static md:translate-y-0 md:mt-10 md:min-w-[600px] md:mr-20 lg:mr-20">

                <!-- Panel info -->
                <div id="panelInfo" class="hidden w-full">
                    <h4 class="font-semibold text-[#990000] mb-2">Información</h4>
                    <p>Sala: {{ $espacio->nombre_sala }}</p>
                    <p>Localidad: {{ $espacio->localidad }}</p>
                    <p>Dirección: {{ $espacio->direccion }}</p>
                    <p>Tel: {{ $espacio->telefono }}</p>
                    <p>Tipo: {{ $espacio->tipo }}</p>
                    <p>Capacidad: {{ $espacio->capacidad }}</p>
                    <p>Equipamiento: {{ $espacio->equipamiento }}</p>
                </div>

                <!-- Panel mapa -->
                <div id="panelMapa" class="hidden w-full">
                    <h4 class="font-semibold text-[#990000] mb-2">Mapa</h4>
                    <div id="contenedor-del-mapa" class="w-full h-80 bg-gray-200" data-direccion="{{ $espacio->direccion }}"></div>
                </div>

                <!-- Panel galería -->
                <div id="panelGaleria" class="hidden w-full">
                    <h4 class="w-full font-semibold text-[#990000] mb-2">Galería</h4>
                    <!-- FOTOS con Alpine.js -->
                    @if (!empty($espacio->fotos) && $espacio->fotos->isNotEmpty())

                    <div x-data="{
                    index: 0,
                    total: {{ count($espacio->fotos) }},
                    fotos: [
                    @foreach ($espacio->fotos as $foto)
                    '{{ asset('storage/' . $foto->ruta) }}',
                    @endforeach
                    ],
                    modalOpen: false
                    }" class="relative w-full flex flex-col items-center">

                        <!-- Foto destacada fuera del modal -->
                        <div class="relative w-[550px] h-[350px]">
                            <img :src="fotos[index]"
                                @click="modalOpen = true"
                                class="w-full h-full object-cover rounded cursor-pointer shadow">

                            <!-- Botón izquierda -->
                            <button @click="index = (index === 0) ? total - 1 : index - 1"
                                class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-[--color-general] bg-opacity-70 p-1 rounded-full shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 24">
                                    <path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12t.15-.75t.45-.675l7.7-7.7q-.375-.375.888-.363t.887.388t.375.875t-.375.875z" />
                                </svg>
                            </button>

                            <!-- Botón derecha -->
                            <button @click="index = (index === total - 1) ? 0 : index + 1"
                                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-[--color-general] bg-opacity-70 p-1 rounded-full shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 24">
                                    <path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Indicadores -->
                        <div class="flex justify-center mt-2 space-x-2">
                            <template x-for="i in total" :key="i">
                                <div :class="{'bg-blue-500': index === i - 1, 'bg-gray-300': index !== i - 1}"
                                    class="w-3 h-3 rounded-full cursor-pointer"
                                    @click="index = i - 1">
                                </div>
                            </template>
                        </div>

                        <!-- Modal -->
                        <div x-show="modalOpen"
                            class="fixed inset-0 bg-black bg-opacity-75 z-50 flex justify-center items-center"
                            x-cloak>
                            <!-- Cerrar -->
                            <span class="absolute top-4 right-8 text-[--color-general] text-4xl cursor-pointer" @click="modalOpen = false">&times;</span>

                            <div class="relative">
                                <img :src="fotos[index]" class="max-h-[80vh] max-w-[80vw] rounded shadow-lg cursor-pointer">

                                <!-- Botón izquierda modal -->
                                <button @click="index = (index === 0) ? total - 1 : index - 1"
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-[--color-general] bg-opacity-70 p-1 rounded-full shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 24">
                                        <path fill="currentColor" d="m3.55 12l7.35 7.35q.375.375.363.875t-.388.875t-.875.375t-.875-.375l-7.7-7.675q-.3-.3-.45-.675T.825 12t.15-.75t.45-.675l7.7-7.7q-.375-.375.888-.363t.887.388t.375.875t-.375.875z" />
                                    </svg>
                                </button>

                                <!-- Botón derecha modal -->
                                <button @click="index = (index === total - 1) ? 0 : index + 1"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-[--color-general] bg-opacity-70 p-1 rounded-full shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 24">
                                        <path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887t.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75t-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1t-.375-.888t.375-.887z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Contenedor principal-->
            <div id="mainFormCont" class="transition-all duration-500 flex justify-center items-center w-full"> <!-- Flex para centrar -->
                <form action="{{ route('reservar') }}" method="POST" class="flex flex-col gap-1 max-w-md w-full lg:w-3/4"> <!-- Centrado y tamaño máximo -->
                    @csrf
                    <input type="hidden" name="nombre_teatro" value="{{ $espacio->nombre }}">
                    <input type="hidden" name="localidad" id="inputLocalidad" data-localidad="{{ $espacio->localidad }}" value="{{ $espacio->localidad }}">
                    <input type="hidden" name="codigo_postal" id="inputCP" data-cp="{{ $espacio->codigopostal }}" value="{{ $espacio->codigopostal }}">
                    <input type="hidden" name="direccion" value="{{ $espacio->direccion }}">
                    <input type="hidden" name="id_espacio" value="{{ $espacio->idespacios }}">

                    <!-- Información de espacio seleccionado de "gestion-salas.blade.php" -->
                    <div class="w-full flex flex-col justify-center items-center">
                        <h5 class="text-center md:text-2xl text-2xl font-tex text-[#990000] border-b border-[#990000] mx-auto max-w-md w-full pb-1">{{ $espacio->nombre }}</h5>

                        <!-- Conteneder principal -->
                        <div class="flex flex-col lg:flex-row justify-center items-start mt-8 w-full">
                            <!--Panel botones -->
                            <div class="w-full lg:w-1/4 h-auto items-start flex flex-row md:flex col md:items-center lg:flex-col lg:items-center justify-center gap-12 lg:mt-0 mb-5">
                                <!--Info -->
                                <button id="btnInfo" type="button" class="text-[#990000] active:text-black">
                                    <svg width="28" height="28" viewBox="0 0 44 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 1.99998H41.3909" stroke="currentcolor" stroke-width="4" stroke-linecap="round" />
                                        <path d="M2 29.8053H41.3909" stroke="currentcolor" stroke-width="4" stroke-linecap="round" />
                                        <path d="M2 15.9027H41.3909" stroke="currentcolor" stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                </button>
                                <!--Mapa -->
                                <button id="btnMapa" type="button" class="text-[#990000] active:text-black">
                                    <svg width="25" height="30" viewBox="0 0 46 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.10704 19.9873C0.608127 32.8886 15.2225 46.038 22.7171 51C30.2116 46.6582 44.9509 34.3772 43.9517 19.9873C42.9524 5.59747 29.3789 2 22.7171 2C16.4716 2.62025 3.60595 7.08608 2.10704 19.9873Z" stroke="currentcolor" stroke-width="4" />
                                        <path d="M23 13C27.3274 13 31 16.7125 31 21.5C31 26.2875 27.3274 30 23 30C18.6726 30 15 26.2875 15 21.5C15 16.7125 18.6726 13 23 13Z" stroke="currentcolor" stroke-width="4" />
                                    </svg>
                                </button>
                                <!--Galería -->
                                <button id="btnGaleria" type="button" class="text-[#990000] active:text-black">
                                    <svg width="25" height="30" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.55556 44H38.4444C40.9604 44 43 41.9107 43 39.3333V6.66667C43 4.08934 40.9604 2 38.4444 2H6.55556C4.03959 2 2 4.08934 2 6.66667V39.3333C2 41.9107 4.03959 44 6.55556 44ZM6.55556 44L31.6111 18.3333L43 30M17.9444 14.8333C17.9444 16.7663 16.4148 18.3333 14.5278 18.3333C12.6408 18.3333 11.1111 16.7663 11.1111 14.8333C11.1111 12.9003 12.6408 11.3333 14.5278 11.3333C16.4148 11.3333 17.9444 12.9003 17.9444 14.8333Z" stroke="currentcolor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>

                            <div class="text-left md:px-20 md:ml-10 mx-auto">
                                <p>Sala: {{ $espacio->nombre_sala }}</p>
                                <p>Localidad: {{ $espacio->localidad }}</p>

                                <!-- Contenedor selección FECHA y HORA -->
                                <div class="flex flex-col gap-1">
                                    <h4 class="mt-2">Selecciona hora y día:</h4>
                                    <div class="flex gap-1">
                                        <input type="date" title="Fecha" name="fecha" id="fecha" min="{{ date('Y-m-d') }}"
                                            class="inputs-text border border-gray-300
                                        {{ $errors->has('fecha') ? 'border-red-500' : 'border-black' }}" value="{{ old('fecha') }}">
                                        @error('fecha')
                                        <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex gap-2 mt-2">
                                        <div class="flex flex-col items-start">
                                            <p>Hora Inicio: </p>
                                            <div class="flex gap-1">
                                                <input type="time" title="Hora inicio"
                                                    name="hora_inicio"
                                                    id="horaInicio"
                                                    class="inputs-text border border-gray-300
                                                    {{ $errors->has('hora_inicio') ? 'border-red-500' : 'border-black' }}"
                                                    value="{{ old('hora_inicio') }}">
                                                @error('hora_inicio')
                                                <p class="text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <p>Hora Fin: </p>
                                            <div class="flex gap-1">
                                                <input type="time" title="Hora Fin" name="hora_fin" id="horaFin"
                                                    class="inputs-text border border-gray-300
                                                {{ $errors->has('hora_fin') ? 'border-red-500' : 'border-black' }}">
                                                @error('hora_fin')
                                                <p class="text-red-500">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contenedor BOTONES -->
                                <div class="flex gap-4 justify-center text-center mt-8 items-center">
                                    <div>
                                        <!-- Volver a view "gestion-salas.blade.php" -->
                                        <a href="{{ route('gestion-salas')}}" class="inline-flex w-[61.97] h-[43.99] justify-center items-center button-reserva-a-filtro">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                                                <path fill="currentColor"
                                                    d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <!-- Realizar reserva -->
                                        <button type="submit" title="Reservar" class="button-confirmar-reserva w-[61.97] h-[43.99]">
                                            <div class="flex justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 16l2 2 4-4" />
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    @if(session('error'))
                                    <p class="text-[--color-primario]">{{ session('error') }}</p>
                                    @elseif(session('festivo'))
                                    <p class="text-[--color-primario]">{{ session('festivo') }}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @else
    <p class="text-center">
        No seleccionaste un espacio en búsqueda de salas:
        <a href="{{ url('gestion-salas') }}" class="hover:text-[#990000] font-semibold">nuevas reservas</a>
    </p>
    @endif
</main>
@vite(['resources/js/reservar-sala.js', 'resources/js/inputsDateTime.js'])
<script src="{{ asset('mapa/mapa.js') }}">
</script>
@endsection
