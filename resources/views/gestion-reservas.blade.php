@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">PANEL DE GESTIÓN DE RESERVAS</h3>
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
                <div class="w-full flex mt-3 justify-center">
                    <a href="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" class="button-primary-auto">
                        Editar
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="text-center mb-10">
        @if (session('correcto'))
        <p class="text-green-500">{{ session('correcto') }}</p>
        @elseif (session('sinDatos'))
        <p class="">{{ session('sinDatos') }}</p>
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
</main>

@endsection
