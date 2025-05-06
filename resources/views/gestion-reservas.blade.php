@extends("layouts.plantilla")

@vite(['resources/css/app.css', 'resources/css/gestion-reservas.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col justify-start w-full items-center sm:mt-[50px] gap-4 lg:gap-12 px-4 lg:px-[150px]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="mt-10 md:text-2xl text-2xl">GESTIÓN DE RESERVAS</h3>
        </div>
    </div>
    <!-- Reservas -->
    <div class="flex justify-center w-full">
        <section class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 4xl:grid-cols-6 gap-4">
            @if(isset($reservas) && $reservas->isNotEmpty())
            @foreach($reservas as $reserva)
            <div class="relative md:h-[180px] group cursor-pointer" tabindex="0">
                <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[180px] lg:w-[280px] flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between gap-8">
                            <h4 class="text-lg font-semibold text-[#990000] gap-2 items-center justify-between truncate overflow-hidden">
                                {{ $reserva->nombre }}
                            </h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-800 group-hover:hidden" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-500 hidden group-hover:block" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                            </svg>
                        </div>
                        <p class="text-sm text-gray-700 truncate">Fecha: {{ $reserva->fecha }}</p>
                        <p class="text-sm text-gray-700">
                            Hora:   {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora)->format('H:i') }} -
                            {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora_fin)->format('H:i') }}
                        </p>
                    </div>
                    <div class="mt-3 flex gap-2">
                        <form action="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" method="GET">
                            <button type="submit" class="button-primary-auto">Editar</button>
                        </form>
                        <form method="POST" action="{{ route('eliminar-reserva', ['id' => $reserva->idreservas]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-secundary-auto">Anular</button>
                        </form>
                    </div>
                </div>

                <!-- Detalle aparece al hover/focus -->
                <div
                    class="contenedor-mas-detalles absolute top-[50px] left-[205px] -translate-x-1/4 mt-2 bg-white p-3 rounded-xl shadow-lg opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity">
                    <p><strong>Nombre:</strong> {{ $reserva->nombre }}</p>
                    <p><strong>Localidad:</strong> {{ $reserva->localidad }}</p>
                    <p><strong>Dirección:</strong> {{ $reserva->direccion }}</p>
                    <p><strong>Código Postal:</strong> {{ $reserva->codigopostal }}</p>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-full">
                <p class="flex gap-[6px]">No tienes ninguna reserva pendiente, ve a <a href="{{ url('buscar-sala') }}" class="hover:text-[#990000] font-semibold flex hover:scale-105">nuevas reservas <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="-translate-y-[8px]" viewBox="0 0 20 20">
                            <path fill="currentColor" d="m16.89 1.2l1.41 1.41c.39.39.39 1.02 0 1.41L14 8.33V18H3V3h10.67l1.8-1.8c.4-.39 1.03-.4 1.42 0m-5.66 8.48l5.37-5.36l-1.42-1.42l-5.36 5.37l-.71 2.12z" />
                        </svg></a></p>
            </div>
            @endif
        </section>
    </div>
    <!-- Mensaje de error o ok si funciona -->
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
