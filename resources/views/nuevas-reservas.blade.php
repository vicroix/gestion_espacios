@extends("layouts.plantilla")

@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->
@vite('resources/css/nuevas-reservas.css')
@section("main")

<main class="flex-grow bg-white">
    <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col md:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="md:w-64 shadow-md">
            <h2 id="h2" @click="openFiltros = !openFiltros">
                <svg id="filtros-icono" class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2H3V4zM3 8h18M3 12h18M3 16h18M3 20h18" />
                </svg>
                Filtros
            </h2>

            <form method="GET" action="{{ route('buscar-sala') }}" class="space-y-6">
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

                <!-- Botón de búsqueda -->
                <button type="submit" class="button-primary-auto w-full">
                    Buscar
                </button>
            </form>
        </aside>

        <!-- Resultados -->
        <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5">
            @foreach ($espacios as $espacio)
            <div class="relative h-[150px] md:h-[180px] group cursor-pointer" tabindex="0">

                <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[180px] lg:w-[300px]">
                    <div class="lg:h-[100px]">
                        <h4 class="text-lg font-semibold text-[#990000]">{{ $espacio->nombre }}</h4>
                        <p class="text-sm text-gray-700">Localidad: {{ $espacio->localidad }}</p>
                        <p class="text-sm text-gray-700 truncate">Dirección: {{ $espacio->direccion }}</p>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('detalle-espacio',['id'=> $espacio->idespacios] )}}" class="inline-flex items-center button-ver-buscarSala">
                            Ver
                            <svg class="ml-2 w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
