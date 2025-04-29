@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Gestión de reservas</h3>
        </div>
    </div>
    <div class="flex justify-center overflow-auto mb-10">
        @if(isset($reservas) && !$reservas->isEmpty())
        <ul class="flex flex-row gap-4 list-none">
            @foreach($reservas as $reserva)
            <li class="border rounded-xl p-4 min-w-[300px] flex-shrink-0 overflow-auto">
                <h5 class="font-semibold">{{ $reserva->nombre }}</h5>
                <p>Localidad: {{ $reserva->localidad }}</p>
                <p>Dirección: {{ $reserva->direccion }}</p>
                <p>Código Postal: {{ $reserva->codigopostal }}</p>
                <p>Hora: {{ $reserva->hora }}</p>
                <p>Fecha: {{ $reserva->fecha }}</p>
                <p hidden>{{ $reserva->idespacios }}</p>
                <div class="w-full flex gap-3 mt-3 items-end justify-center">
                    <div class="w-full flex gap-3 mt-3 justify-center items-center">
                        <form action="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" method="GET" class="m-0">
                            <button type="submit" class="button-primary-auto">
                                Editar
                            </button>
                        </form>
                        <form method="POST" action="{{ route('eliminar-reserva', ['id' => $reserva->idreservas]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-secundary-auto">
                                Anular
                            </button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <p class="">No se encontraron reservas</p>
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
