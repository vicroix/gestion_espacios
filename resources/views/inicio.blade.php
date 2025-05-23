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
    <div class="bg-white rounded-lg p-6 shadow-lg w-full max-w-xl relative">
       <!-- Botón de cierre (X) -->
        <button id="closeBtn" class="absolute top-4 right-4 text-[#990000] hover:text-gray-800 text-4xl font-bold">&times;</button>

        <div class="m-4">
            <!-- Título centrado -->
            <div class="flex justify-center">
                <div class="titulo-main w-full flex justify-center">
                <h3 class="text-2xl border-b">INICIO SESIÓN</h3>
                </div>
            </div>

            <!-- Contenedor central del formulario e iconos -->
            <div class="flex justify-center mt-10">
                <div class="flex items-start">
                    <!-- Iconos a la izquierda -->
                    <div class="flex flex-col gap-4 mt-6 px-4 min-w-[40px]">
                        <!-- Icono Email -->
                        <svg width="30" height="30" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30 15.0001V24.3751C30 25.8669 30.5927 27.2976 31.6475 28.3525C32.7024 29.4074 34.1332 30.0001 35.625 30.0001C37.1169 30.0001 38.5476 29.4074 39.6025 28.3525C40.6574 27.2976 41.25 25.8669 41.25 24.3751V22.5001C41.2498 18.2682 39.8179 14.161 37.1874 10.8461C34.5569 7.53115 30.8823 5.2036 26.7612 4.24186C22.6401 3.28013 18.3149 3.74076 14.4888 5.54887C10.6627 7.35698 7.56076 10.4062 5.68738 14.2008C3.81399 17.9954 3.27933 22.3121 4.17033 26.449C5.06134 30.586 7.3256 34.2999 10.5949 36.9868C13.8643 39.6737 17.9465 41.1757 22.1776 41.2485C26.4088 41.3212 30.5402 39.9605 33.9 37.3876M30 22.5001C30 26.6422 26.6422 30.0001 22.5 30.0001C18.3579 30.0001 15 26.6422 15 22.5001C15 18.3579 18.3579 15.0001 22.5 15.0001C26.6422 15.0001 30 18.3579 30 22.5001Z" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <!-- Icono Contraseña -->
                        <svg width="30" height="30" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.125 20.625V13.125C13.125 10.6386 14.1127 8.25403 15.8709 6.49587C17.629 4.73772 20.0136 3.75 22.5 3.75C24.9864 3.75 27.371 4.73772 29.1291 6.49587C30.8873 8.25403 31.875 10.6386 31.875 13.125V20.625M9.375 20.625H35.625C37.6961 20.625 39.375 22.3039 39.375 24.375V37.5C39.375 39.5711 37.6961 41.25 35.625 41.25H9.375C7.30393 41.25 5.625 39.5711 5.625 37.5V24.375C5.625 22.3039 7.30393 20.625 9.375 20.625Z" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <!-- Formulario -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="bg-[--color-general] w-80 rounded-lg p-6 flex flex-col items-center gap-4">
                        @csrf
                        <input class="inputs-text border border-gray-300 w-full" type="email" name="email" placeholder="Correo electrónico" required>
                        <input class="inputs-text border border-gray-300 w-full" type="password" name="password" placeholder="Contraseña" required>

                        @if(session('error'))
                        <p class="text-red-500">{{ session('error') }}</p>
                        @endif
                    </form>
                </div>
        </div>
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
