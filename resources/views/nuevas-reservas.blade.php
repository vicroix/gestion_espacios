@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->

@section("main")

<!--flex-grow empuja el footer hacia abajo-->
<main class="flex-grow bg-white">
    <div class="max-w-3xl mx-auto px-1">
        <!-- Encabezado con margen vertical responsivo: menor en móviles y mayor en pantallas grandes -->
        <h3 class="text-[#000000] mt-3 sm:mt-10">NUEVAS RESERVAS</h3>
        <!-- Línea separatoria: sin clases de ancho completo y sin padding, se adapta al ancho del contenedor -->
        <div class="border-b border-black mt-1"></div>

        <!-- sin prefijo (móvil) sm(tablet) md(medio) lg(grande)-->
        <!--flex-col para que se ponga cada div uno debajo del otro-->
        <!--max-w-3xl no será más grande que 3xl, para que no se estire con el w-full -->
        <form class="w-full flex flex-col justify-center mt-5 p-6">

            <div class="flex flex-col sm:flex-row sm:items-center mb-4">

                <!-- w-32 fijo en todas las etiquetas para alinear -->
                <label for="nombreTeatro" class="w-32 mb-1 sm:mb-0 mr-2">Nombre del teatro</label>
                <input type="text" id="nombreTeatro" name="nombreTeatro" placeholder="Escriba el nombre del teatro"
                    class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 focus:outline-none focus:border-[#990000]">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                <label for="LocalidadTeatro" class="w-32 mb-1 sm:mb-0 mr-2">Localidad del teatro</label>
                <input type="text" id="LocalidadTeatro" name="LocalidadTeatro" placeholder="Escriba la localidad"
                    class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 focus:outline-none focus:border-[#990000]">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                <label for="codigoPostal" class="w-32 mb-1 sm:mb-0 mr-2">Código postal del teatro</label>
                <!-- input type="number" sirve como validación para que no deje escribir algo que no sea número-->
                <input type="number" id="codigoPostal" name="codigoPostal" placeholder="Escriba el código postal"
                    class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 focus:outline-none focus:border-[#990000]">
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                <label for="tipoSala" class="w-32 mb-1 sm:mb-0 mr-2">Tipo de sala</label>
                <!-- Desplegable con las opciones -->
                <select id="tipoSala" name="tipoSala"
                    class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 focus:outline-none focus:border-[#990000]">
                    <option value="selected"></option> <!--Para que no salga seleccionada ninguna de las opciones default-->
                    <option value="ensayo">Ensayo</option>
                    <option value="publico">Con público</option>
                </select>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center mb-4">
                <!--desplegable aforo opciones-->
                <label for="aforo" class="w-32 mb-1 sm:mb-0 mr-2">Aforo</label>
                <select id="aforo" name="aforo"
                    class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black placeholder-gray-500 focus:outline-none focus:border-[#990000]">
                    <option value="selected"></option>
                    <option value="pequeña">hasta 10 personas</option>
                    <option value="mediana">hasta 20 personas</option>
                    <option value="grande">hasta 50 personas</option>
                    <option value="aforoEspecifico">Específico</option>
                </select>
            </div>

            <!-- flex-wrap sm:flex-nowrap: permite que los bloques se apilen si no caben, pero mantengan fila en pantallas medianas hacia arriba -->
            <div class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-4 mb-4">
                <!-- flex-1 en ambos bloques: divide el espacio disponible uniformemente-->
                <div class="flex flex-col sm:flex-row sm:items-center flex-1 min-w-[250px]">
                    <label for="fecha" class="w-32 mb-1 sm:mb-0 mr-2">Fecha</label>
                    <input type="date" id="fecha"
                        class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black focus:outline-none focus:border-[#990000]" />
                </div>


                <div class="flex flex-col sm:flex-row sm:items-center flex-1 min-w-[250px]">
                    <label for="hora" class="w-32 mb-1 sm:mb-0 mr-2">Hora</label>
                    <input type="time" id="hora"
                        class="flex-1 px-3 py-2 border border-[#000000] rounded-md text-black focus:outline-none focus:border-[#990000]" />
                </div>
            </div>
            <div class="flex justify-center">
                <a href="busquedasalas.html">
                    <button type="button"
                        class="w-24 h-10 bg-[#990000] rounded-md flex justify-center items-center shadow-md hover:cursor-pointer hover:scale-105 transition-transform duration-200">
                        <img src="img/logo-lupa.png" class="w-6 h-6" alt="Buscar" />
                    </button>
                </a>
            </div>
        </form>
        <div class="h-[80%] justify-center items-center align-center p-6">
            <form method="GET" class="border rounded-xl flex flex-col gap-1 m-0 items-center" action="{{ route('buscar-sala') }}">
                @csrf
                <input type="text" name="nombre" placeholder="Buscar nombre Teatro" class="flex-1 px-3 py-1 border border-[#000000] rounded-md text-black focus:outline-none focus:border-[#990000]">
                <input type="text" name="localidad" placeholder="Buscar por localidad" class="flex-1 px-3 py-1 border border-[#000000] rounded-md text-black focus:outline-none focus:border-[#990000]">
                <button type="submit"
                    class="w-20 h-7 bg-[#990000] rounded-md text-white flex justify-center items-center shadow-md hover:cursor-pointer hover:scale-105 transition-transform duration-200 m-2">
                    Filtrar
                </button>
            </form>
            <div>
                <h4 class="text-center my-1">Resultados</h4>
                @if(isset($espacios) && !$espacios->isEmpty())
                <ul class="list-none">
                    @foreach($espacios as $espacio)
                    <li class="border rounded-xl p-2 mb-2">
                        <h5 class="font-semibold">{{ $espacio->nombre }}</h5>
                        <p>Localidad: {{ $espacio->localidad }}</p>
                        <p>Capacidad: {{ $espacio->capacidad }}</p>
                        <p>Tipo: {{ $espacio->tipo }}</p>
                        <p>Sala: {{ $espacio->nombre_sala }}</p>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
