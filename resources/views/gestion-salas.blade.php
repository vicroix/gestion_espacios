@extends('layouts.plantilla')

@section('title', 'Proximos eventos')
@vite('resources/css/nuevas-reservas.css')
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->
@section('main')

    <div class="min-h-screen flex flex-col">
        <div class="flex justify-center">
            <div class="titulo-main w-full flex justify-center">
                <h3 class="md:text-2xl text-2xl">BUSQUEDA SALAS</h3>
            </div>
        </div>
        <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col  items-center min-w-[320px] gap-4 lg:items-start lg:flex-row">
            <!-- Sidebar de filtros -->
            <aside class="w-64 px-2 shadow-md">
                <h2 id="h2" @click="openFiltros = !openFiltros" class="mt-2">
                    <!--Añadir sala-->
                    <div class="flex justify-center button-primary-auto mt-2 w-[61.97]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m-5-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                        </svg>
                    </div>
                    <!--Filtrar sala-->

                    <div class="flex justify-center button-primary-auto mt-2 w-[61.97]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4h16v2.172a2 2 0 0 1-.586 1.414L15 12v7l-6 2v-8.5L4.52 7.572A2 2 0 0 1 4 6.227z" />
                        </svg>
                    </div>
                    <!--Icono de filtros-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                    </svg>
                    Filtros
                </h2>

                <form method="GET" action="{{ route('gestion-salas') }}" class="space-y-0 mb-2 pl-1">
                    <!-- Ciudades -->
                    <div>
                        <h3 id="h3" class="flex gap-1 items-center" @click="openCiudades = !openCiudades">
                            Ciudades
                            <span x-show="!openCiudades" class="text-[--color-primario]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
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
                                    class="w-full border rounded p-1 mr-2" placeholder="Localidad">
                            </div>
                            @foreach (['Madrid', 'Barcelona', 'Sevilla', 'Málaga', 'Granada', 'Huelva', 'Valencia', 'Cádiz', 'Tarragona', 'Cádiz', 'Salamanca', 'León'] as $ciudad)
                                <label class="block text-sm text-gray-600">
                                    <input type="checkbox" name="ciudades[]" value="{{ $ciudad }}" class="mr-2">
                                    {{ $ciudad }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tipo de sala -->
                    <div>
                        <h3 id="h3" class="flex gap-1 items-center" @click="openTipo = !openTipo">
                            Tipo de sala
                            <span x-show="!openTipo" class="text-[--color-primario]"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="15" height="15" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                </svg></span>
                            <span x-show="openTipo"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                </svg></span>
                        </h3>
                        <div x-show="openTipo" x-transition>
                            @foreach (['Obra', 'Ensayo'] as $tipo)
                                <label class="block text-sm text-gray-600">
                                    <input type="radio" name="tipo" value="{{ strtolower($tipo) }}" class="mr-2">
                                    {{ $tipo }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Capacidad (AFORO) -->
                    <div>
                        <h3 id="h3" class="flex gap-1 items-center" @click="openAforo = !openAforo">
                            Aforo
                            <span x-show="!openAforo" class="text-[--color-primario]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                </svg></span>
                            <span x-show="openAforo"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                </svg></span>
                        </h3>
                        @foreach (['10' => 'Hasta 10 personas', '20' => 'Hasta 20 personas', '30' => 'Hasta 30 personas'] as $valor => $label)
                            <label class="block text-sm text-gray-600" x-show="openAforo">
                                <input type="radio" name="capacidad" value="{{ $valor }}" class="mr-2">
                                {{ $label }}
                            </label>
                        @endforeach
                    </div>

                    <!-- + Filtros -->
                    <div class="mt-4">
                        <h3 id="h3" class="flex gap-1 items-center" @click="openFiltros = !openFiltros">
                            Filtros
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
                        <div x-show="openFiltros" x-transition class="pl flex flex-col gap-1">
                            <!-- Equipamiento -->
                            <div>
                                <!-- <h3 id="h3">Equipamiento</h3> -->
                                <input type="text" name="equipamiento" value="{{ request()->input('equipamiento') }}"
                                    class="w-full border rounded p-1 mr-2" placeholder="Equipamiento">
                            </div>

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

                            <!-- Nombre de sala -->
                            <div>
                                <!-- <h3 id="h3">Nombre de sala</h3> -->
                                <input type="text" name="nombre_sala" value="{{ request()->input('nombre_sala') }}"
                                    class="w-full border rounded p-1" placeholder="Nombre de sala">
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <!-- Botón de búsqueda -->
                        <button type="submit" class="button-primary-auto mt-2 w-[61.97]">
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

            <!-- Resultados -->
            <section
                class="grid w-[90%] xl:gap-12 place-items-center grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-4 4xl:grid-cols-5">
                @foreach ($espacios as $espacio)
                    <div class="relative hover:bg-slate-100/85 h-[147.6px] w-[300px] cursor-pointer shadow rounded-xl transition duration-250 ease-in-out hover:shadow-lg"
                        tabindex="0">
                        <div class="rounded-xl shadow p-3 border-t-4 border-[--color-primario]">
                            <div>
                                <div class="flex justify-between gap-4">
                                    <h4
                                        class="text-lg font-semibold text-[--color-primario] items-center justify-between truncate">
                                        {{ $espacio->nombre }}
                                    </h4>
                                    <div class="group w-[40px] flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-gray-800 w-full group-hover:hidden rounded-xl shadow-around shadow-gray-400"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-gray-500 w-full hidden group-hover:block rounded-xl shadow-around shadow-[--color-primario]"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                                        </svg>
                                        <!-- Detalle aparece abajo, ligeramente a la derecha -->
                                        <div
                                            class="contenedor-mas-detalles absolute p-3 rounded-xl shadow-lg left-1/2 -translate-x-1/2 top-[100%] w-[300px] pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300">
                                            <p><strong>Nombre:</strong> {{ $espacio->nombre }}</p>
                                            <p><strong>Sala:</strong> {{ $espacio->nombre_sala }}</p>
                                            <p><strong>Direccion:</strong> {{ $espacio->direccion }}</p>
                                            <p><strong>Tel:</strong> {{ $espacio->telefono }}</p>
                                            <p><strong>Tipo:</strong> {{ $espacio->tipo }}</p>
                                            <p><strong>Capacidad:</strong> {{ $espacio->capacidad }}</p>
                                            <p><strong>Equipamiento:</strong> {{ $espacio->equipamiento }}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700">Localidad: {{ $espacio->localidad }}</p>
                                <p class="text-sm text-gray-700 truncate">Dirección: {{ $espacio->direccion }}</p>
                            </div>
                            <div class="mt-3 flex gap-3 items-center">
                                <!-- Botón con Mapa y Flecha -->
                                <a href="{{ route('detalle-espacio', ['id' => $espacio->idespacios]) }}"
                                    class="inline-flex w-[55.95] h-[40] justify-center items-center button-filtro-a-reserva">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 2048 2048">
                                        <path fill="currentColor"
                                            d="M1792 993q60 41 107 93t81 114t50 131t18 141q0 119-45 224t-124 183t-183 123t-224 46q-91 0-176-27t-156-78t-126-122t-85-157H128V128h256V0h128v128h896V0h128v128h256zM256 256v256h1408V256h-128v128h-128V256H512v128H384V256zm643 1280q-3-31-3-64q0-86 24-167t73-153h-97v-128h128v86q41-51 91-90t108-67t121-42t128-15q100 0 192 33V640H256v896zm573 384q93 0 174-35t142-96t96-142t36-175q0-93-35-174t-96-142t-142-96t-175-36q-93 0-174 35t-142 96t-96 142t-36 175q0 93 35 174t96 142t142 96t175 36m64-512h192v128h-320v-384h128zM384 1024h128v128H384zm256 0h128v128H640zm0-256h128v128H640zm-256 512h128v128H384zm256 0h128v128H640zm384-384H896V768h128zm256 0h-128V768h128zm256 0h-128V768h128z" />
                                    </svg>
                                </a>
                                <!-- Botón con Lápiz y Flecha -->
                                @if (session('id_rol') === 1)
                                    <a href="{{ route('editar-salas', ['id' => $espacio->idespacios]) }}"
                                        class="inline-flex w-[55.95] h-[40] justify-center items-center button-filtro-a-editar-sala">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                            </g>
                                        </svg>
                                    </a>
                                @endif
                                <!-- Botón con Eliminar -->
                                @if (session('id_rol') === 1)
                                    <a href=""
                                        class="inline-flex w-[55.95] h-[40] justify-center items-center button-filtro-a-editar-sala">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

        </div>
        @vite('resources/js/nuevas-reservas.js')
    @endsection


