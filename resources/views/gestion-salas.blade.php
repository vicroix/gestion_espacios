@extends('layouts.plantilla')


@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-salas -->

<title>Crear Salas</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section('main')
    <section class="flex flex-col lg:w-full">
        <div class="flex justify-center">
            <div class="titulo-main w-full flex justify-center md:mx-[70px]">
                <h3 class="mt-10 md:text-2xl text-2xl">GESTIÓN DE SALAS</h3>
            </div>
        </div>
        <!--Inputs de Crear de salas-->
        <div class="flex justify-center min-w-[300px] w-full mt-5">
            <form id="formGestionSalas" action="{{ route('gestion-espacio') }}" enctype="multipart/form-data" method="POST"
                class="bg-[--color-general] lg:w-[300px] m-8 rounded-lg flex-col flex gap-2 justify-center">
                @csrf
                <div class="w-full flex flex-col gap-2">
                    <!--Información básica-->
                    <div class="mb-1 bg-gray-50 p-6 rounded-lg shadow-sm">
                        <h2 class="text-lg mb-4">Información básica</h2>
                        <!--nombre teatro-->
                        <div class="flex items-center">
                            <!-- INPUT NOMBRE TEATRO -->
                            <input
                                class="inputs-text mb-4 border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                type="text" name="nombre_teatro" id="nombre_teatro" placeholder="Nombre del teatro">
                        </div>

                        <div class="flex items-center">
                            <!-- INPUT NOMBRE SALA -->
                            <input
                                class="inputs-text mb-4 border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                                type="text" name="nombre_sala" id="nombre_sala" placeholder="Nombre Sala">
                        </div>
                        <div class="flex gap-1">
                            <!-- INPUT LOCALIDAD -->
                            <div class="w-full mb-4">
                                <input
                                    class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                    type="text" name="localidad" id="localidad" placeholder="Localidad">
                            </div>
                            <!-- INPUT CODIGO POSTAL -->
                            <div class="w-[50%]">
                                <input
                                    class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                    type="text" name="codigo_postal" id="codigo_postal" placeholder="C.P.">
                            </div>
                        </div>
                        <div class="flex gap-1">
                            <div class="w-full">
                                <!-- INPUT DIRECCION -->
                                <input
                                    class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                    type="text" name="direccion" id="direccion" placeholder="Dirección">
                            </div>
                        </div>
                    </div>
                    <!--Datos de contacto-->
                    <div class="mb-1 bg-gray-50 p-6 rounded-lg shadow-sm">
                        <h2 class="text-lg mb-4">Datos de contacto</h2>
                        <!--gmail-->
                        <div class="flex items-center mb-4">
                            <!-- INPUT EMAIL -->
                            <input
                                class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                                type="email" name="email" id="email" placeholder="Correo electrónico">
                        </div>
                        <!-- INPUT TELEFONO -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none
                            invalid:focus:ring-red-400 peer w-full"
                            type="text" name="telefono" id="telefono" placeholder="Teléfono">
                    </div>
                    <div class="w-full">
                    </div>
                    <!--Características del espacio-->
                    <div class="mb-1 bg-gray-50 p-6 rounded-lg shadow-sm">
                        <h2 class="text-lg mb-4">Características del espacio</h2>
                        <div class="flex justify-between mb-4">
                            <div class="flex items-center">
                                <!-- SELECT TIPO (Obra / Ensayo) -->
                                <select
                                    class="inputs-text border border-gray-300 text-gray-500 focus:outline-none
                         invalid:focus:ring-red-400 peer w-full"
                                    type="text" name="tipo_sala" id="tipo_sala">
                                    <option value="" disabled selected hidden>Tipo</option>
                                    <option value="Obra" class="text-black">Con público</option>
                                    <option value="Ensayo" class="text-black">Ensayo</option>
                                </select>
                            </div>

                            <div class="flex items-center">
                                <!-- INPUT Aforo (10 / 20 / 50 personas) -->
                                <select
                                    class="inputs-text border border-gray-300 text-gray-500 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                                    type="text" name="aforo" id="aforo">
                                    <option value="" disabled selected hidden>Aforo</option>
                                    <option value="10" class="text-black">Hasta 10 personas</option>
                                    <option value="20" class="text-black">Hasta 20 personas</option>
                                    <option value="50" class="text-black">Hasta 50 personas</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <!-- TEXTAREA EQUIPAMIENTO -->
                            <textarea
                                class="inputs-text mb-4 border border-gray-300 min-h-[60px] focus:outline-none
                 invalid:focus:ring-red-400 peer w-full"
                                rows="3" name="equipamiento" id="equipamiento" placeholder="Equipamiento"></textarea>
                        </div>
                        <!-- FOTOS -->
                        <div>
                            <input type="file" name="fotos[]" multiple>
                        </div>
                        <div class="text-center">
                            @if (session('correcto'))
                                <p class="text-green-500">{{ session('correcto') }}</p>
                            @else
                                <p class="text-red-500">{{ session('error') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!--botones-->
                <div class="mt-6 mb-5 flex justify-center gap-4">
                    <button type="submit"
                        class="button-primary-auto lg:w-[108.85px] cursor-pointer w-[55.95] h-[40] flex justify-center items-center" title="Confirmar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 376 384">
                            <path fill="currentColor" d="M119 282L346 55l29 30l-256 256L0 222l30-30z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>
    @vite('resources/js/gestion-salas.js')
@endsection
