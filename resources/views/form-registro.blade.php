@extends('layouts.plantilla')
@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/prueba-laravel/public/form-registro -->

<title>Registro</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section('main')
    <main class="w-full justify-center flex flex-col">
        <div class="flex justify-center">
            <div class="titulo-main w-full flex justify-center md:mx-[70px]">
                <h3 class="md:text-2xl text-2xl">REGISTRO DE USUARIO</h3>
            </div>
        </div>
        <section
            class=" flex justify-center items-center bg-white shadow-lg rounded-lg">
            <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-[1200px]">
                <!-- Formulario -->
                <form id="formRegistro" action="{{ route('registro') }}" method="POST"
                    class="w-full md:w-[600px] px-4 md:px-0">
                    @csrf
                    <div class="flex flex-col gap-5">
                        @if (session('success'))
                            <p class="text-green-500">{{ session('success') }}</p>
                        @else
                            <p class="text-red-500">{{ session('error') }}</p>
                        @endif

                        <!--Nombre-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M5.121 17.804A9.969 9.969 0 0112 15c2.055 0 3.956.618 5.516 1.671M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="text"
                                name="nombre" placeholder="Nombre*" required>
                        </div>
                        <!--Apellidos-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="text"
                                name="apellidos" placeholder="Apellidos*" required>
                        </div>
                        <!--Usuario-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M12 14c4.418 0 8 1.79 8 4v2H4v-2c0-2.21 3.582-4 8-4zm0-2a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="text"
                                name="usuario" placeholder="Usuario*" required>
                        </div>
                        <!--Contraseña-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V9a5 5 0 00-10 0v2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="password"
                                name="password" placeholder="Contraseña*" required>
                        </div>
                        <!--Correo electrónico-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16v16H4z" />
                                <path d="M22 6l-10 7L2 6" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="email"
                                name="email" placeholder="Correo electrónico*" required>
                        </div>
                        <!--Teléfono-->
                        <div class="relative w-[75%]">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M3 5a2 2 0 012-2h1.3a1 1 0 01.95.7l1.1 3.2a1 1 0 01-.25 1L7.1 10a15.9 15.9 0 006 6l1.9-1.9a1 1 0 011-.25l3.2 1.1a1 1 0 01.7.95V19a2 2 0 01-2 2h0C9.3 21 3 14.7 3 7.1V7a2 2 0 010-2z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="text"
                                name="telefono" placeholder="Teléfono*" maxlength="9" required>
                        </div>

                        <p>*Campo obligatorio</p>
                        <p id="mensaje" class="text-red-500"></p>

                        <div class="flex justify-center">
                            <input
                                class="button-primary-auto w-20 py-1 mt-3 text-[color-secundario] rounded-md cursor-pointer"
                                type="submit" value="Registrar">
                        </div>
                    </div>
                </form>

                <!-- Imagen solo en escritorio -->
                <div class="relative hidden md:block w-full max-w-xl ml-4">
                    <img src="img/fondo.jpg" class="w-[400px] h-[500px] rounded-lg" alt="Imagen de fondo">
                    <div
                        class="absolute top-0 left-0 h-full w-32 bg-gradient-to-r from-white to-transparent pointer-events-none">
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
@vite('resources/js/form-registro.js')
