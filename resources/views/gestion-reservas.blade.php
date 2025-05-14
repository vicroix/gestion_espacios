@extends("layouts.plantilla")

@vite(['resources/css/app.css', 'resources/css/gestion-reservas.css', 'resources/css/nuevas-reservas.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<div class="flex flex-col">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">GESTIÓN DE RESERVAS</h3>
        </div>
    </div>
    <!-- Reservas -->
    <div class="flex justify-center w-full">
        <section class="grid w-[90%]  gap-12 place-items-center grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 2xl:grid-cols-5 3xl:grid-cols-6">
            @if(isset($reservas) && $reservas->isNotEmpty())
            @foreach($reservas as $reserva)
            <div class="relative h-[147.6px] w-[300px] cursor-pointer" tabindex="0">
                <div class="rounded-xl shadow p-3 border-t-4 border-[--color-primario] transition duration-250 ease-in-out hover:shadow-lg">
                    <div>
                        <div class="flex justify-between gap-4">
                            <h4 class="text-lg font-semibold text-[--color-primario] items-center justify-between truncate">
                                {{ $reserva->nombre }}
                            </h4>
                            <div class="group w-[40px] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-800 w-full group-hover:hidden rounded-xl shadow-around shadow-gray-400" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-500 w-full hidden group-hover:block rounded-xl shadow-around shadow-[--color-primario]" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                                </svg>
                                <!-- Detalle aparece al hover/focus -->
                                <div
                                    class="contenedor-mas-detalles absolute p-3 rounded-xl shadow-lg left-1/2 -translate-x-1/2 top-[100%] w-[300px] pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p><strong>Nombre:</strong> {{ $reserva->nombre }}</p>
                                    <p><strong>Localidad:</strong> {{ $reserva->localidad }}</p>
                                    <p><strong>Dirección:</strong> {{ $reserva->direccion }}</p>
                                    <p><strong>Código Postal:</strong> {{ $reserva->codigopostal }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 truncate">Fecha: {{ $reserva->fecha }}</p>
                        <p class="text-sm text-gray-700">
                            Hora: {{ \Carbon\Carbon::createFromFormat('H:i:s', $reserva->hora)->format('H:i') }} -
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
            </div>
            @endforeach
            @else
            <div class="col-span-full">
                <p class="flex gap-[6px]">No tienes ninguna reserva pendiente, ve a <a href="{{ url('buscar-sala') }}" class="hover:text-[--color-primario] font-semibold flex hover:scale-105">nuevas reservas <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="-translate-y-[8px]" viewBox="0 0 20 20">
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
</div>
@endsection
