@extends("layouts.plantilla")

@vite(['resources/css/app.css', 'resources/css/gestion-reservas.css', 'resources/css/nuevas-reservas.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<title>Reservas</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<div class="flex flex-col">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">GESTIÓN DE RESERVAS</h3>
        </div>
    </div>
    <!-- Mensaje de error o ok si funciona -->
    <div class="flex gap-2 justify-center mb-5">
        @if (session('actualizado'))
        <p class="text-[--color-primario] text-md font-semibold">{{ session('actualizado') }}</p>
        <p class="text-green-600 font-semibold">actualizada correctamente</p>
        @elseif(session('reservado'))
        <p class="text-green-600 text-md font-semibold">{{ session('reservado') }}</p>
        @elseif(session('eliminado'))
        <p class="text-[--color-primario] text-md font-semibold">{{ session('eliminado') }}</p>
        <p class="text-red-950 font-semibold">eliminado correctamente</p>
        @elseif (session('sinDatos'))
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
    <div x-data="{ openHora: false,openFecha:false ,openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col items-center min-w-[320px] gap-1 lg:items-start lg:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="w-64 px-2 shadow-md">
            <h2 id="h2" @click="openFiltros = !openFiltros" class="mt-2">
                <!--Icono de filtros-->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                </svg>
                Filtrar reservas
            </h2>
            <form method="GET" action="{{ route('filtro-reservas') }}" class="space-y-0 mb-2 pl-1">
                <!-- Fecha -->
                <div class="flex flex-col w-[150px]">
                    <input type="date" name="fecha" class="mr-2 my-1" value="{{ old('fecha') }}">
                </div>
                <!-- Hora -->
                <div class="flex flex-col my-3 w-[90px]">
                    <input type="time" name="hora" class="mr-2 my-1" value="{{ old('hora') }}">
                </div>
                <!-- + Filtros -->
                <div class="mt-4">
                    <h3 id="h3" class="flex gap-1 items-center" @click="openFiltros = !openFiltros">
                        Filtro avanzado
                        <span x-show="!openFiltros" class="text-[--color-primario]"><svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                            </svg></span>
                        <span x-show="openFiltros"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                height="15" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                            </svg></span>
                    </h3>
                    <div x-show="openFiltros" x-transition class="flex flex-col gap-1">
                        <!-- Nombre del teatro -->
                        <div>
                            <!-- <h3 id="h3">Nombre del teatro</h3> -->
                            <input type="text" name="nombre" value="{{ request()->input('nombre') }}"
                                class="w-full border rounded p-1" placeholder="Nombre del teatro">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <!-- <h3 id="h3">Dirección</h3> -->
                            <input type="text" name="direccion" value="{{ request()->input('direccion') }}"
                                class="w-full border rounded p-1" placeholder="Dirección">
                        </div>
                        <div class="flex gap-3">
                            <p>Mostrar reservas pasadas</p>
                            <input type="checkbox" name="fechasPasadas" value="1" class="mr-2 cursor-pointer">
                        </div>
                        <!-- Ciudades -->
                        <div class="flex flex-col my-3">
                            <h3 id="h3" class="flex gap-1 items-center" @click="openCiudades = !openCiudades">
                                Ciudades
                                <span x-show="!openCiudades" class="text-[--color-primario]"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                    </svg></span>
                                <span x-show="openCiudades"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                        height="15" viewBox="0 0 32 32">
                                        <path fill="currentColor"
                                            d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                    </svg></span>
                            </h3>
                            <div x-show="openCiudades" x-transition>
                                <div class="mb-2">
                                    <!-- <h3 id="h3">Equipamiento</h3> -->
                                    <input type="text" name="localidad" value="{{ request()->input('localidad') }}"
                                        class="w-full border rounded p-1 mr-2 my-1" placeholder="Localidad">
                                </div>
                                @foreach (['Madrid', 'Barcelona', 'Sevilla', 'Málaga', 'Granada', 'Huelva', 'Valencia', 'Cádiz', 'Tarragona', 'Cádiz', 'Salamanca', 'León'] as $ciudad)
                                <label class="block text-sm text-gray-600">
                                    <input type="checkbox" name="ciudades[]" value="{{ $ciudad }}" class="mr-2">
                                    {{ $ciudad }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center">
                    <!-- Botón de búsqueda -->
                    <button type="submit" class="button-primary-auto mt-2 w-[61.97] mb-2" title="Buscar">
                        <div class="flex justify-center">
                            <svg width="50" height="18" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35 35L27.75 27.75M31.6667 18.3333C31.6667 25.6971 25.6971 31.6667 18.3333 31.6667C10.9695 31.6667 5 25.6971 5 18.3333C5 10.9695 10.9695 5 18.3333 5C25.6971 5 31.6667 10.9695 31.6667 18.3333Z"
                                    stroke=var(--color-general) stroke-width="2.56" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                </div>
            </form>
        </aside>
        <!-- Reservas -->
        <section class="grid w-[80%] xl:gap-12 place-items-center grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-4 4xl:grid-cols-5">
            @if(isset($reservas) && $reservas->isNotEmpty())
            @foreach($reservas as $reserva)
            <div class="relative hover:bg-slate-100/85 h-[147.6px] w-[300px] cursor-pointer shadow rounded-xl transition duration-250 ease-in-out hover:shadow-lg" tabindex="0">
                <div class="rounded-xl p-3 border-t-4 border-[--color-primario]">
                    <div>
                        <div class="flex justify-between gap-4">
                            <h4 class="text-lg font-semibold text-[--color-primario] items-center justify-between truncate">
                                {{ $reserva->nombre }}
                            </h4>
                            <div class="group w-[40px] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-800 w-full group-hover:hidden rounded-xl shadow-around shadow-gray-400" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-500 w-full hidden group-hover:block rounded-xl shadow-around shadow-[--color-primario]" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                                </svg>
                                <!-- Detalle aparece al hover/focus -->
                                <div
                                    class="contenedor-mas-detalles absolute p-3 rounded-xl shadow-lg left-1/2 -translate-x-1/2 top-[100%] w-[300px] pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p><strong>Nombre:</strong> {{ $reserva->nombre }}</p>
                                    <p><strong>Localidad:</strong> {{ $reserva->localidad }}</p>
                                    <p><strong>Dirección:</strong> {{ $reserva->direccion }}</p>
                                    <p><strong>Código Postal:</strong> {{ $reserva->codigopostal }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 truncate">Fecha: {{ $reserva->fecha }}</p>
                        <p class="text-sm text-gray-700">
                            Hora: {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora)->format('H:i') }} -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora_fin)->format('H:i') }}
                        </p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <!--Botón editar reserva-->
                        <form action="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" method="GET">
                            <button type="submit" class="button-primary-auto w-[55.95] h-[40] flex justify-center items-center" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                        <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                    </g>
                                </svg>
                            </button>
                        </form>
                        <!--Botón eliminar reserva-->
                        <form method="POST" action="{{ route('eliminar-reserva', ['id' => $reserva->idreservas]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-secundary-auto w-[55.95] h-[40] flex justify-center items-center" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-full">
                <p class="flex gap-[6px]">No tienes ninguna reserva pendiente, ve a <a href="{{ url('gestion-salas') }}" class="hover:text-[--color-primario] font-semibold flex hover:scale-105">nuevas reservas <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="-translate-y-[8px]" viewBox="0 0 20 20">
                            <path fill="currentColor" d="m16.89 1.2l1.41 1.41c.39.39.39 1.02 0 1.41L14 8.33V18H3V3h10.67l1.8-1.8c.4-.39 1.03-.4 1.42 0m-5.66 8.48l5.37-5.36l-1.42-1.42l-5.36 5.37l-.71 2.12z" />
                        </svg></a></p>
            </div>
            @endif
        </section>
    </div>
    @vite('resources/js/nuevas-reservas.js')
    @endsection
