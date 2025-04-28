@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">PANEL DE GESTIÓN DE RESERVAS</h3>
    </div>
    <div class="flex justify-center overflow-auto mb-10 flex-1 max-h-[470px]">
        <!-- Si $espaci  os que viene Controllers/GestionSalas es distinto de null o vacío, muestra los registros  -->
        @if(isset($reservas) && !$reservas->isEmpty())
        <ul class="list-none">
            @foreach($reservas as $reserva)
            <li class="border rounded-xl p-2 mb-2">
                <h5 class="font-semibold">{{ $reserva->nombre }}</h5>
                <p>Localidad: {{ $reserva->localidad }}</p>
                <p>Dirección: {{ $reserva->direccion }}</p>
                <p>Código Postal: {{ $reserva->codigopostal }}</p>
                <p>Capacidad: {{ $reserva->capacidad }}</p>
                <p>Tipo: {{ $reserva->tipo }}</p>
                <p>Sala: {{ $reserva->nombre_sala }}</p>
                <p hidden>{{ $reserva->idespacios }}</p>
                <div class="w-full flex mt-2 justify-center">
                    <!-- Enviar datos de vuelta por parámetro a js/nuevas-reservas.js -->
                    <button
                        type="button"
                        onclick="rellenarFormulario(
                    '{{ $reserva->nombre }}',
                    '{{ $reserva->localidad }}',
                    '{{ $reserva->codigopostal }}',
                    '{{ $reserva->capacidad }}',
                    '{{ $reserva->tipo }}',
                    '{{ $reserva->idespacios }}',
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
</main>

@endsection
