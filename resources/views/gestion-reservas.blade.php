@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 lg:gap-12 px-4 lg:px-[150px] h-[59vh]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Gestión de reservas</h3>
        </div>
    </div>
    <div class="flex justify-center mb-10 overflow-y-auto max-h-auto w-full">
        <!-- Si  $reservas esta definida y no es null, crea la vista con los datos de la reserva del usuario -->
        @if(isset($reservas) && !$reservas->isEmpty())
        <ul class="flex flex-col sm:flex-row gap-4 list-none w-full sm:w-max sm:overflow-x-auto sm:scroll-smooth">
            @foreach($reservas as $reserva)

            <li class="bg-white rounded-xl shadow p-3 group cursor-pointer border-t-4 border-[#990000] lg:h-[250px] lg:w-[300px]">
                <h4 class="text-lg font-semibold text-[#990000]">{{ $reserva->nombre }}</h4>
                <p>Localidad: {{ $reserva->localidad }}</p>
                <p>Dirección: {{ $reserva->direccion }}</p>
                <p>Código Postal: {{ $reserva->codigopostal }}</p>
                <label class="flex gap-1 text-[#990000]">Hora:<p class="text-black">{{ $reserva->hora }}</p></label>
                <label class="flex gap-1 text-[#990000]">Fecha:<p class="text-black">{{ $reserva->fecha }}</p></label>
                <p hidden>{{ $reserva->idespacios }}</p>
                <div class="w-full flex gap-3 mt-3 justify-center items-center">
                    <form action="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" method="GET" class="m-0">
                        <button type="submit" class="button-primary-auto">Editar</button>
                    </form>
                    <!--   -->
                    <form method="POST" action="{{ route('eliminar-reserva', ['id' => $reserva->idreservas]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-secundary-auto">Anular</button>
                    </form>
                </div>
                <div class="contenedor-mas-detalles top-[100px] left-[180px] -translate-x-1/4 mt-2 shadow-lg group-hover:opacity-100 group-focus-within:opacity-100">
                    <p><strong>Tel:</strong> {{ $reserva->telefono }}</p>
                    <p><strong>Tipo:</strong> {{ $reserva->tipo }}</p>
                    <p><strong>Capacidad:</strong> {{ $reserva->capacidad }}</p>
                    <p><strong>Equipamiento:</strong> {{ $reserva->equipamiento }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <p class="">No tienes ninguna reserva pendiente, ve a <a href="{{ url('buscar-sala') }}" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
        @endif
    </div>

    <div class="text-center mb-10">
        @if (session('correcto'))
        <p class="text-green-500">{{ session('correcto') }}</p>
        @elseif (session('sinDatos'))
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
</main>

@endsection
