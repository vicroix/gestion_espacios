@extends("layouts.plantilla")

@vite(['resources/css/app.css', 'resources/css/gestion-reservas.css', 'resources/css/nuevas-reservas.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<title>Reservas</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<div class="flex flex-col">
    <div class="flex justify-center mb-5">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="text-2xl">GESTIÓN DE RESERVAS</h3>
        </div>
    </div>
    <!-- Mensaje de error o ok si funciona -->
    <div class="flex gap-2 justify-center mb-4">
        @if (session('actualizado'))
        <p class="text-[--color-primario] font-semibold">{{ session('actualizado') }}</p>
        <p class="text-green-600 font-semibold">actualizada correctamente</p>
        @elseif(session('reservado'))
        <p class="text-green-600 font-semibold">{{ session('reservado') }}</p>
        @elseif(session('eliminado'))
        <p class="text-[--color-primario] font-semibold">{{ session('eliminado') }}</p>
        <p class="text-red-950 font-semibold">eliminado correctamente</p>
        @elseif (session('sinDatos'))
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
    <div x-data="{ openHora: false,openFecha:false ,openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="relative flex flex-col items-center min-w-[320px] gap-4 lg:items-start lg:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="w-64 px-2 shadow-md">
            <div class="flex justify-between p-2">
                <h2 id="h2" @click="openFiltros = !openFiltros">
                    <!--Icono de filtros-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                    </svg>
                    Filtrar reservas
                </h2>
            </div>
            <form method="GET" action="{{ route('filtro-reservas') }}" class="flex flex-col gap-2 space-y-0 mb-2 px-1">
                <!-- Fecha y Hora-->
                <div class="flex justify-between relative">
                    <input type="date" name="fecha" class="inputs-filtros w-[55%]" value="{{ old('fecha') }}">
                    <input type="time" name="hora" class="inputs-filtros w-[40%]" value="{{ old('hora') }}">
                    <!-- Botón para resetear filtro -->
                    <button type="reset" class="absolute right-0 -translate-y-[54px] w-[30px]" title="Limpiar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16" class="mb-4 p-1 w-full items-cente hover:shadow-around border-2 hover:shadow-gray-300 hover:bg-gray-200 rounded-md">
                            <g fill="none">
                                <g clip-path="url(#IconifyId196d9d8a7b2e9fd2d1)">
                                    <path fill="currentColor" fill-rule="evenodd" d="M11.995.667a.75.75 0 1 0-1.49.166L11.19 7h-.867c-1.64 0-2.896 1.449-3.197 3.06a12.6 12.6 0 0 1-1.2 3.44C5.434 14.448 5 15 5 15h8.5s2.08-1.734 2.488-5.49C16.14 8.094 14.91 7 13.488 7H12.7zM3.75 2.5a.75.75 0 1 0 0 1.5h4.5a.75.75 0 0 0 0-1.5zM.75 6a.75.75 0 1 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zM1 10.25a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75m6.593 3.25c.393-.866.78-1.94 1.008-3.165C8.819 9.167 9.646 8.5 10.322 8.5h3.167c.332 0 .618.13.797.303a.63.63 0 0 1 .21.545c-.175 1.622-.708 2.779-1.173 3.514a6 6 0 0 1-.461.638h-.999c.539-.706.887-1.728.887-2.75H12c-.351 1.229-1.072 2.088-2.162 2.75z" clip-rule="evenodd" />
                                </g>
                                <defs>
                                    <clipPath id="IconifyId196d9d8a7b2e9fd2d1">
                                        <path fill="currentColor" d="M0 0h16v16H0z" />
                                    </clipPath>
                                </defs>
                            </g>
                        </svg>
                    </button>
                </div>
                <!-- + Filtros -->
                <div>
                    <h3 id="h3" class="flex justify-between items-center border-b p-1" @click="openFiltros = !openFiltros">
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
                    <div x-show="openFiltros" x-transition class="flex flex-col gap-2">
                        <!-- Nombre del teatro -->
                        <div>
                            <input type="text" name="nombre" value="{{ request()->input('nombre') }}"
                                class="inputs-filtros w-full" placeholder="Nombre del teatro">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <input type="text" name="direccion" value="{{ request()->input('direccion') }}"
                                class="inputs-filtros w-full border rounded" placeholder="Dirección">
                        </div>
                        <div class="flex justify-between gap-1 items-center border-b p-1">
                            <p class="texto-filtros">Mostrar reservas pasadas</p>
                            <input type="checkbox" name="fechasPasadas" value="1" class="cursor-pointer">
                        </div>
                        <!-- Ciudades -->
                        <div class="flex flex-col my-3">
                            <h3 id="h3" class="flex justify-between gap-1 items-center border-b p-1" @click="openCiudades = !openCiudades">
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
                                    <input type="text" name="localidad" value="{{ request()->input('localidad')}}"
                                        class="inputs-filtros w-full mr-2 my-1" placeholder="Localidad">
                                </div>
                                @foreach (['Madrid', 'Barcelona', 'Sevilla', 'Málaga', 'Granada', 'Huelva', 'Valencia', 'Cádiz', 'Tarragona', 'Cádiz', 'Salamanca', 'León'] as $ciudad)
                                <label class="block text-gray-600">
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
                    <button type="submit" class="button-primary-auto mt-2 w-[75px] mb-2" title="Buscar">
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
            <div class="relative hover:bg-slate-100/85 h-[165px] w-[300px] cursor-default shadow rounded-xl transition duration-250 ease-in-out hover:shadow-lg" tabindex="0">
                <div class="rounded-xl p-3 border-t-4 border-[--color-primario]">
                    <div>
                        <div class="flex justify-between gap-4 items-center">
                            <h4 class="text-lg font-semibold text-[--color-primario] items-center justify-between truncate">
                                {{ $reserva->nombre }}
                            </h4>
                            @if ($reserva->espacio->movilidad_reducida === 'Si')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" class="rounded-md">
                                <path fill="#00B1FF" d="M508.333 32.666C508.333 16.35 494.984 3 478.668 3H29.032C14.348 3 2.333 15.015 2.333 29.699v452.602C2.333 496.985 14.348 509 29.032 509h449.635c16.316 0 29.666-13.35 29.666-29.666z" />
                                <path fill="#0096D1" d="M478.668 488.915H29.032c-14.684 0-26.699-12.015-26.699-26.699v20.085C2.333 496.985 14.348 509 29.032 509h449.635c16.316 0 29.666-13.35 29.666-29.666v-20.085c0 16.316-13.349 29.666-29.665 29.666" />
                                <circle cx="221.736" cy="92.69" r="40.87" fill="#FFF" />
                                <path fill="#FFF" d="M194.156 449.052c-11.593 0-23.184-1.522-34.315-4.548c-17.688-4.809-34.539-13.548-48.729-25.274c-14.164-11.705-25.927-26.579-34.018-43.015c-8.333-16.925-12.939-35.892-13.321-54.851c-.384-19.083 3.483-38.317 11.185-55.625c7.424-16.684 18.564-31.962 32.217-44.186a131 131 0 0 1 17.229-13.026c9.941-6.298 23.106-3.344 29.405 6.598s3.344 23.107-6.598 29.405a88 88 0 0 0-11.606 8.773c-9.207 8.243-16.713 18.534-21.71 29.763c-5.173 11.626-7.771 24.573-7.512 37.44c.257 12.763 3.351 25.518 8.947 36.884c5.45 11.069 13.379 21.092 22.931 28.985c9.551 7.893 20.879 13.771 32.76 17.001c12.542 3.41 25.964 3.983 38.814 1.662c12.209-2.207 24.068-7.131 34.292-14.24c10.147-7.056 18.874-16.376 25.236-26.954a87 87 0 0 0 4.726-9.016c4.843-10.726 17.463-15.497 28.191-10.65c10.726 4.843 15.494 17.465 10.65 28.191a130 130 0 0 1-7.047 13.444c-9.437 15.689-22.379 29.514-37.426 39.977c-15.209 10.575-32.86 17.901-51.044 21.188a131 131 0 0 1-23.257 2.074" />
                                <path fill="#FFF" d="M446.968 319.8c-8.322-8.321-21.814-8.323-30.137 0l-4.128 4.128l-45.308-45.307a21.3 21.3 0 0 0-15.068-6.241H265.78v-44.029h63.098c11.769 0 21.31-9.541 21.31-21.31s-9.541-21.31-21.31-21.31H265.78v-6.467c0-16.621-13.474-30.095-30.095-30.095h-27.897c-16.621 0-30.095 13.474-30.095 30.095v105.429c0 16.621 13.474 30.095 30.095 30.095h4.233c.93.124 1.872.21 2.837.21h128.644l54.134 54.134c4.161 4.161 9.615 6.241 15.068 6.241s10.907-2.08 15.068-6.241l19.196-19.196c8.322-8.322 8.322-21.814 0-30.136" />
                            </svg>
                            @endif
                            <div class="group w-[40px] flex justify-center cursor-pointer items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-800 w-full group-hover:hidden rounded-xl shadow-around shadow-gray-400" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-500 w-full hidden group-hover:block rounded-xl shadow-around shadow-[--color-primario]" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                                </svg>
                                <!-- Detalle aparece al hover/focus -->
                                <div
                                    class="contenedor-mas-detalles absolute p-3 font-text  rounded-xl shadow-lg left-1/2 -translate-x-1/2 top-[100%] w-[300px] pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p><strong>Nombre:</strong> {{ $reserva->nombre }}</p>
                                    <p><strong>Localidad:</strong> {{ $reserva->localidad }}</p>
                                    <p><strong>Dirección:</strong> {{ $reserva->direccion }}</p>
                                    <p><strong>Código Postal:</strong> {{ $reserva->codigopostal }}</p>
                                    <p><strong>Grupo:</strong> {{ $reserva->grupos->pluck('nombre_grupo')->implode(', ') }}</p>

                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">
                            Fecha:
                            <span class="bg-[--color-primario]/10 text-[--color-primario] font-semibold px-2 py-0.5 rounded-md">
                                {{ $reserva->fecha }}
                            </span>
                        </p>
                        <p class="text-gray-700">
                            Hora:
                            <span class="bg-[--color-primario]/10 text-[--color-primario] font-semibold px-2 py-0.5 rounded-md">
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora_fin)->format('H:i') }}
                            </span>
                        </p>
                    </div>
                    <div class="mt-3 flex justify-end gap-2">
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
            <div class="col-span-full flex flex-col gap-2 justify-center lg:absolute lg:left-1/2 lg:top-[5%] lg:-translate-x-1/2">
                <p class="text-center">No tienes ninguna reserva pendiente, ve a
                </p>
                <a href="{{ url('gestion-salas') }}" class="hover:text-[--color-primario] font-semibold items-center gap-2 justify-center flex">nuevas reservas
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                        <path fill="currentColor" d="m16.89 1.2l1.41 1.41c.39.39.39 1.02 0 1.41L14 8.33V18H3V3h10.67l1.8-1.8c.4-.39 1.03-.4 1.42 0m-5.66 8.48l5.37-5.36l-1.42-1.42l-5.36 5.37l-.71 2.12z" />
                    </svg>
                </a>
            </div>
            @endif
        </section>
    </div>
    @endsection
