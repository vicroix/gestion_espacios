@extends("layouts.plantilla")

@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->
@vite('resources/css/nuevas-reservas.css')
@section("main")

<main class="flex-grow bg-white">
    <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col gap-4 md:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="md:w-64 shadow-md">
            <h2 id="h2" @click="openFiltros = !openFiltros">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                </svg>
                Filtros
            </h2>

            <form method="GET" action="{{ route('buscar-sala') }}" class="space-y-2">
                <!-- Ciudades -->
                <div>
                    <h3 id="h3" @click="openCiudades = !openCiudades">
                        Ciudades
                        <span x-show="!openCiudades">+</span>
                        <span x-show="openCiudades">-</span>
                    </h3>
                    <div x-show="openCiudades" x-transition>
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
                    <h3 id="h3" @click="openTipo = !openTipo">
                        Tipo de sala
                        <span x-show="!openTipo">+</span>
                        <span x-show="openTipo">-</span>
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
                    <h3 id="h3" @click="openAforo = !openAforo">
                        Aforo
                        <span x-show="!openAforo">+</span>
                        <span x-show="openAforo">-</span>
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
                    <h3 id="h3" @click="openFiltros = !openFiltros">
                        Filtros
                        <span x-show="!openFiltros">+</span>
                        <span x-show="openFiltros">-</span>
                    </h3>
                    <div x-show="openFiltros" x-transition>
                        <!-- Equipamiento -->
                        <div>
                            <h3 id="h3">Equipamiento</h3>
                            <input type="text" name="equipamiento" value="{{ request()->input('equipamiento') }}" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre del teatro -->
                        <div>
                            <h3 id="h3">Nombre del teatro</h3>
                            <input type="text" name="nombre" value="{{ request()->input('nombre') }}" class="w-full border rounded p-2">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <h3 id="h3">Dirección</h3>
                            <input type="text" name="direccion" value="{{ request()->input('direccion') }}" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre de sala -->
                        <div>
                            <h3 id="h3">Nombre de sala</h3>
                            <input type="text" name="nombre_sala" value="{{ request()->input('nombre_sala') }}" class="w-full border rounded p-2">
                        </div>
                    </div>
                </div>
                <div class="w-full text-center">
                    <!-- Botón de búsqueda -->
                    <button type="submit" class="button-primary-auto">
                        <svg width="50" height="18" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M35 35L27.75 27.75M31.6667 18.3333C31.6667 25.6971 25.6971 31.6667 18.3333 31.6667C10.9695 31.6667 5 25.6971 5 18.3333C5 10.9695 10.9695 5 18.3333 5C25.6971 5 31.6667 10.9695 31.6667 18.3333Z" stroke="white" stroke-width="2.56" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </button>
                </div>
            </form>
        </aside>

        <!-- Resultados -->
        <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5">
            @foreach ($espacios as $espacio)
            <div class="relative h-[150px] md:h-[180px] group cursor-pointer" tabindex="0">
                <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[180px] lg:w-[280px]">
                    <div class="lg:h-[100px]">
                        <h4 class="text-lg font-semibold text-[#990000]">{{ $espacio->nombre }}</h4>
                        <p class="text-sm text-gray-700">Localidad: {{ $espacio->localidad }}</p>
                        <p class="text-sm text-gray-700 truncate">Dirección: {{ $espacio->direccion }}</p>
                    </div>
                    <div class="mt-3">
                        <!-- Botón con Mapa y Flecha -->
                        <a href="{{ route('detalle-espacio',['id'=> $espacio->idespacios] )}}" class="inline-flex items-center button-filtro-a-reserva">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 100 100" class="svg-botones">
                                <path fill="currentColor" d="M91.967 7.961c0-.016.005-.031.005-.047a2.733 2.733 0 0 0-2.73-2.733H39.559v.011L8.031 36.721h-.003v55.365h.003v.001a2.735 2.735 0 0 0 2.734 2.731h78.479a2.73 2.73 0 0 0 2.663-2.15h.06v-.536l.004-.044c.002-.022-.004-.029-.004-.044zm-24.328 7.177H82.01v24.597L63.897 21.621zM39.57 39.453a2.73 2.73 0 0 0 2.722-2.73V15.138H61.88l-27.17 47.06l-16.725-16.725v-6.02zM17.985 84.862V52.527L32.128 66.67L21.626 84.862zm9.4 0l33.93-58.769l20.696 20.696v38.073z" />
                                <path fill="currentColor" d="M62.03 45.576c-6.645 0-12.026 5.387-12.026 12.027c0 2.659.873 5.109 2.334 7.1l7.759 13.439q.069.142.157.271l.016.027l.004-.002a2.16 2.16 0 0 0 3.405.132l.02.011l.075-.129a2.3 2.3 0 0 0 .287-.497l7.608-13.178a11.96 11.96 0 0 0 2.39-7.175c-.003-6.639-5.384-12.026-12.029-12.026M61.911 63.7a5.924 5.924 0 0 1-5.926-5.925a5.926 5.926 0 1 1 5.926 5.925" />
                            </svg>
                            <svg class="ml-1 w-3 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Detalle aparece abajo, ligeramente a la derecha -->
                <div class="contenedor-mas-detalles top-[100px] left-[180px] -translate-x-1/4 mt-2 shadow-lg group-hover:opacity-100 group-focus-within:opacity-100">
                    <p><strong>Direccion:</strong> {{ $espacio->direccion }}</p>
                    <p><strong>Tel:</strong> {{ $espacio->telefono }}</p>
                    <p><strong>Tipo:</strong> {{ $espacio->tipo }}</p>
                    <p><strong>Capacidad:</strong> {{ $espacio->capacidad }}</p>
                    <p><strong>Equipamiento:</strong> {{ $espacio->equipamiento }}</p>
                </div>

            </div>
            @endforeach
        </section>


    </div>
</main>
@vite('resources/js/nuevas-reservas.js')
@endsection
