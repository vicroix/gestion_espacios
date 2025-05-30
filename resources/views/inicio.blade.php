@extends('layouts.plantilla')
@extends("layouts.inicio-sesion")

@vite(['resources/css/app.css', 'resources/css/inicio.css'])
<!-- @vite('resources/css/inicio.css') -->

@section('title', 'Inicio')

<!-- http://localhost/L25_gestionespacios/public/ -->
<title>TeatroGest</title>
<link rel="icon" type="image/png" href="/img/Logo.png">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@section('main')

<div class="relative w-[90%] max-h-90 flex justify-between">
    <!-- Columna izquierda: contenido -->
    <div class="w-1/2 flex md:flex-col items-center z-10 bg-transparent p-6">
        <div class="w-full max-w-[90%]">
            <!-- Sección principal de presentación de la aplicación -->
            <section class="section-presentacion 4xl:w-[50vw]">
                <div class="flex justify-start">
                    <h2 class="text-[--color-primario]">TeatroGest</h2>
                </div>
                <div>
                    <!-- Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto -->
                    <!-- Texto introductorio -->
                    <p class="home-texto-bienvenida leading-relaxed p-5">
                        Bienvenidos a <b>TeatroGest</b> 🎭

                        Aplicación para la gestión de reservas de espacios teatrales, dedicado a la magia del
                        espectáculo, donde el arte y la cultura cobran vida.

                        ¡Encuentra tu espacio para poder vivir el espectáculo con nosotros! 🎶✨
                    </p>
                </div>
            </section>
        </div>

        <div class="contenedor-reseñas mt-[20px] w-full max-w-[90%] 2xl:mt-10 xl:w-[1000px]">
            <div>
                <!-- Reseñas BUSCAR API -->
                <div class="flex items-start ml-5">
                    <h2 class="text-[--color-primario]">Reseñas</h2>
                </div>

                <!-- Elfsight Google Reviews | Untitled Google Reviews -->
                <section class="flex">

                    <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-3f894ccc-f643-4019-935b-cff19c55c358" data-elfsight-app-lazy></div>
                </section>
            </div>
        </div>
    </div>

    <!-- Columna derecha: fondo borroso -->
    <div class=" h-full relative overflow-hidden">
        <img src="{{ asset('/img/fondo-inicio.jpg') }}" alt="Teatro" class="min-w-[300px] xl:max-w-[700px] h-full object-cover" />
    </div>
</div>

@endsection
