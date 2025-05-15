@extends("layouts.plantilla")

@vite(['resources/css/app.css', 'resources/css/gestion-reservas.css', 'resources/css/nuevas-reservas.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<title>Reservas</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<div class="flex flex-col">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">GESTIÓN DE RESERVAS</h3>
        </div>
    </div>
    <!-- Mensaje de error o ok si funciona -->
    <div class="flex gap-2 justify-center mb-5">
        @if (session('actualizado'))
        <p class="text-[--color-primario] text-md font-semibold">{{ session('actualizado') }}</p>
        <p class="text-green-600 font-semibold">actualizada correctamente</p>
        @elseif(session('reservado'))
        <p class="text-green-600 text-md font-semibold">{{ session('reservado') }}</p>
        @elseif(session('eliminado'))
        <p class="text-[--color-primario] text-md font-semibold">{{ session('eliminado') }}</p>
        <p class="text-red-950 font-semibold">eliminado correctamente</p>
        @elseif (session('sinDatos'))
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
    <!-- Reservas -->
    <div class="flex justify-center w-full">
        <section class="grid w-[90%]  gap-12 place-items-center grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 2xl:grid-cols-4 3xl:grid-cols-6">
            @if(isset($reservas) && $reservas->isNotEmpty())
            @foreach($reservas as $reserva)
            <div class="relative h-[147.6px] w-[300px] cursor-pointer" tabindex="0">
                <div class="rounded-xl hover:bg-slate-100/85 shadow p-3 border-t-4 border-[--color-primario] transition duration-250 ease-in-out hover:shadow-lg">
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
                        <!--Botón editar reserva-->
                        <form action="{{ route('editar-reserva', ['id' => $reserva->idreservas]) }}" method="GET">
                            <button type="submit" class="button-primary-auto w-[55.95] h-[40] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                            </g>
                                        </svg>
                            </button>
                        </form>
                        <!--Botón eliminar reserva-->
                        <form method="POST" action="{{ route('eliminar-reserva', ['id' => $reserva->idreservas]) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button-secundary-auto w-[55.95] h-[40] flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                            </button>
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
</div>
@endsection
