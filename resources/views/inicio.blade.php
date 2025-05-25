@extends('layouts.plantilla')

@vite(['resources/css/app.css', 'resources/css/inicio.css'])
<!-- @vite('resources/css/inicio.css') -->
@section('title', 'Inicio')
<!-- http://localhost/L25_gestionespacios/public/ -->

<title>TeatroGest</title>
<link rel="icon" type="image/png" href="/img/Logo.png">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


@section('main')
<!-- Modal -->
<div id="loginModal" class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg p-5 shadow-lg w-full max-w-xl relative">
        <div class="flex flex-col gap-4">
            <!-- Título centrado -->
            <div class="flex justify-center">
                <div class="titulo-main w-full flex justify-center">
                    <h3 class="text-2xl border-b">INICIO SESIÓN</h3>
                </div>
                <!-- Botón de cierre (X) -->
                <button id="closeBtn" class="absolute top-4 right-4 text-[#990000] hover:text-gray-800 text-4xl font-bold">&times;</button>
            </div>

            <!-- Contenedor central del formulario e iconos -->
            <div class="flex justify-center mt-4">
                <div class="flex items-start">
                    <!-- Formulario -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="bg-[--color-general] w-80 rounded-lg  flex flex-col items-center gap-4">
                        @csrf

                        <!--Correo electrónico-->
                        <div class="relative w-full">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16v16H4z" />
                                <path d="M22 6l-10 7L2 6" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="email"
                                name="email" placeholder="Correo electrónico" required>
                        </div>
                        <!--Contraseña-->
                        <div class="relative w-full">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V9a5 5 0 00-10 0v2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="password"
                                name="password" placeholder="Contraseña" required>
                        </div>
                        @if(session('error'))
                        <p class="text-red-500">{{ session('error') }}</p>
                        @endif
                    </form>
                </div>
            </div>
            <!-- Botón registro -->
            <p class="text-center">Si no tienes cuenta, <a href="{{ url('form-registro') }}"
                    class="text-[--color-primario]">crea una cuenta
                </a></p>
            <!-- Botón fuera del formulario, centrado globalmente -->
            <div class="w-full flex justify-center">
                <input class="button-primary-auto" type="submit" value="Iniciar sesión" form="loginForm" title="Iniciar sesión">
            </div>
        </div>
    </div>
</div>

<main class="xl:mx-10 gap-3 items-center justify-start 2xl:mt-5">
    <div class="w-[90%]">
        <!--Sección principal de presentación de la aplicación-->
        <section class="section-presentacion">
            <div class="flex justify-start">
                <h2 class="text-[--color-primario]">TeatroGest</h1>
            </div>
            <div>
                <!--Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto-->
                <!--Texto introductorio-->
                <p class="home-texto-bienvenida leading-relaxed float-left">Bienvenidos a <b>TeatroGest</b> 🎭
                    <img src="img/sillones.jpg" alt="sillones teatro" class="float-right p-3 xl:p-3 xl:pt-0 w-[190px] sm:w-[240px]">
                    Aplicación para la gestión de reservas de espacios espacio teatrales, dedicado a la magia del
                    espectáculo, donde el arte y la cultura cobran vida. Con una arquitectura impresionante y tecnología de
                    vanguardia, nuestro teatro ofrece una experiencia única para cada espectador.
                    Desde obras de teatro clásicas y modernas hasta conciertos, danza y eventos especiales, celebramos el
                    talento y la creatividad en todas sus formas. Contamos con cómodas instalaciones, una acústica
                    excepcional y un ambiente acogedor que garantiza una experiencia inolvidable.
                    ¡Encuentra tu espacio para poder vivir el espectáculo con nosotros! 🎶✨
                </p>
            </div>
        </section>
    </div>
    <div class="contenedor-reseñas mt-[20px] w-[90%] 2xl:mt-10 xl:w-[1000px]">
        <div>
            <!--Reseñas BUSCAR API-->
            <div class="flex items-start ml-5">
                <h2 class="text-[--color-primario]">Reseñas</h1>
            </div>
            <!-- Elfsight Google Reviews | Untitled Google Reviews -->
            <section class="flex">
                <!--................................COMENTADO PARA NO CARGAR LA API Y CONSUMIR TOKENS. ELIMINAR COMENTARIO CUANDO SE VAYA A UTILIZAR.......................
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-3f894ccc-f643-4019-935b-cff19c55c358" data-elfsight-app-lazy></div>-->
            </section>
        </div>
    </div>
</main>
@endsection
