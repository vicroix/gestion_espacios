@extends("layouts.plantilla")

@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->

@section("main")

<!--flex-grow empuja el footer hacia abajo-->
<main class="flex-grow bg-white">
    <div class="max-w-3xl flex mx-auto px-1">
        <div>
            <!-- Encabezado con margen vertical responsivo: menor en móviles y mayor en pantallas grandes -->
            <h3 class="text-[#000000] mt-3 sm:mt-10">NUEVAS RESERVAS</h3>
            <!-- Línea separatoria: sin clases de ancho completo y sin padding, se adapta al ancho del contenedor -->
            <div class="border-b border-black mt-1"></div>
            <!-- sin prefijo (móvil) sm(tablet) md(medio) lg(grande)-->
            <!--flex-col para que se ponga cada div uno debajo del otro-->
            <!--max-w-3xl no será más grande que 3xl, para que no se estire con el w-full -->
            <div class="flex justify-end">
                <form class="flex flex-col justify-center mt-5 p-6" method="POST" action="{{ route('reservar') }}">
                    @csrf
                    <div class="flex flex-col items-center border-2 p-4 m-3">
                        <h3 class="text-center mb-3 text-gray-500">Rellenar campos seleccionando al filtrar</h3>
                        <input type="hidden" id="id_espacio" name="id_espacio" readonly hidden>
                        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                            <!-- w-32 fijo en todas las etiquetas para alinear -->
                            <label for="nombreTeatro" class="w-32 mb-1 sm:mb-0 mr-2">Nombre del teatro</label>
                            <input type="text" id="nombreTeatro" name="nombreTeatro" readonly
                                class="inputs-text-disabled placeholder-gray-500 bg-gray-100 cursor-not-allowed focus:outline-none">
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                            <label for="LocalidadTeatro" class="w-32 mb-1 sm:mb-0 mr-2">Localidad del teatro</label>
                            <input type="text" id="LocalidadTeatro" name="LocalidadTeatro" readonly
                                class="inputs-text-disabled flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 bg-gray-100 cursor-not-allowed focus:outline-none">
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                            <label for="codigoPostal" class="w-32 mb-1 sm:mb-0 mr-2">Código postal del teatro</label>
                            <!-- input type="number" sirve como validación para que no deje escribir algo que no sea número-->
                            <input type="string" id="codigoPostal" name="codigoPostal" readonly
                                class="inputs-text-disabled flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 bg-gray-100 cursor-not-allowed focus:outline-none">
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                            <label for="tipoSala" class="w-32 mb-1 sm:mb-0 mr-2">Tipo de sala</label>
                            <!-- Desplegable con las opciones -->
                            <select id="tipoSala" name="tipoSala" disabled
                                class="flex-1 px-3 py-1.5 border border-[#000000] rounded-md text-black placeholder-gray-500 bg-gray-100 cursor-not-allowed focus:outline-none">
                                <option value="" disabled selected hidden>Tipo de Sala</option> <!--Para que no salga seleccionada ninguna de las opciones default-->
                                <option value="Ensayo">Ensayo</option>
                                <option value="Obra">Con público</option>
                            </select>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                            <!--desplegable aforo opciones-->
                            <label for="aforo" class="w-32 mb-1 sm:mb-0 mr-2">Aforo</label>
                            <select id="aforo" name="aforo" disabled
                                class="flex-1 px-3 py-1.5 border border-[#000000] rounded-md text-black placeholder-gray-500 bg-gray-100 cursor-not-allowed focus:outline-none">
                                <option value="" disabled selected hidden>Aforo</option>
                                <option value="10">Hasta 10 personas</option>
                                <option value="20">Hasta 20 personas</option>
                                <option value="50">Hasta 50 personas</option>
                            </select>
                        </div>
                    </div>

                    <!-- flex-wrap sm:flex-nowrap: permite que los bloques se apilen si no caben, pero mantengan fila en pantallas medianas hacia arriba -->
                    <div>

                    </div>
                    <div class="flex flex-col m-3">
                        <div class="flex gap-2">
                            <!-- flex-1 en ambos bloques: divide el espacio disponible uniformemente-->
                            <div class="flex sm:flex-row sm:items-center">
                                <p for="fecha" class="w-[150px] mb-1 sm:mb-0 mr-2">Elige fecha y hora</p>
                                <input type="date" id="fecha" name="fecha" min="{{ date('Y-m-d') }}"
                                    class="inputs-text" />
                            </div>

                            <div class="flex sm:flex-row sm:items-center">
                                <input type="time" id="hora" name="hora"
                                    class="inputs-text w-auto flex-shrink-0" />
                            </div>
                        </div>
                        <div class="flex justify-center p-2">
                            @if (session('correcto'))
                            <p class="text-green-500">{{ session('correcto') }}</p>
                            @else
                            <p class="text-red-500">{{ session('error') }}</p>
                            @endif
                        </div>
                        <div class="flex gap-4 justify-center">
                            <button type="submit"
                                class="button-primary-auto flex justify-center items-center hover:cursor-pointer">
                                Reservar
                            </button>
                            <button type="reset"
                                class="button-secundary-auto flex justify-center items-center hover:cursor-pointer">
                                Borrar
                            </button>
                        </div>
                    </div>

                </form>
            </div>


        </div>
        <!-- Filtro para buscar Espacios en la BBDD -->
        <div class="h-[80%] justify-center items-center align-center mt-10 ml-10">
            <form method="GET" class="border rounded-xl flex flex-col gap-1 m-0 p-2 items-center" action="{{ route('buscar-sala') }}">
                @csrf
                <h4 class="text-center">Buscar por:</h4>
                <input type="text" name="nombre" placeholder="Nombre teatro" class="inputs-text">
                <input type="text" name="localidad" placeholder="Localidad" class="inputs-text">
                <button type="submit"
                    class="button-primary-auto flex justify-center items-center hover:cursor-pointer m-2">
                    Filtrar
                </button>
            </form>
            <h4 class="text-center my-1">Resultados</h4>
            <div class="flex justify-center overflow-auto mb-10 flex-1 max-h-[470px]">
                <!-- Si $espaci  os que viene Controllers/GestionSalas es distinto de null o vacío, muestra los registros  -->
                @if(isset($espacios) && !$espacios->isEmpty())
                <ul class="list-none">
                    @foreach($espacios as $espacio)
                    <li class="border rounded-xl p-2 mb-2">
                        <h5 class="font-semibold">{{ $espacio->nombre }}</h5>
                        <p>Localidad: {{ $espacio->localidad }}</p>
                        <p>Dirección: {{ $espacio->direccion }}</p>
                        <p>Código Postal: {{ $espacio->codigopostal }}</p>
                        <p>Capacidad: {{ $espacio->capacidad }}</p>
                        <p>Tipo: {{ $espacio->tipo }}</p>
                        <p>Sala: {{ $espacio->nombre_sala }}</p>
                        <p hidden>{{ $espacio->idespacios }}</p>
                        <div class="w-full flex mt-2 justify-center">
                            <!-- Enviar datos de vuelta por parámetro a js/nuevas-reservas.js -->
                            <button
                                type="button"
                                onclick="rellenarFormulario(
                    '{{ $espacio->nombre }}',
                    '{{ $espacio->localidad }}',
                    '{{ $espacio->codigopostal }}',
                    '{{ $espacio->capacidad }}',
                    '{{ $espacio->tipo }}',
                    '{{ $espacio->idespacios }}',
                )"
                                class="button-primary-auto">
                                Seleccionar
                            </button>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</main>
@vite('resources/js/nuevas-reservas.js')
@endsection
