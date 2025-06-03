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

<div class="h-full flex flex-col items-center md:flex-row justify-between p-4">
    <!-- Columna izquierda: contenido -->
    <div class="flex-row md:flex-col justify-center items-center z-10 md:p-6">
        <div class="w-full min-w-[300px] max-w-[1200px]">
            <!-- Sección principal de presentación de la aplicación -->
            <section class="section-presentacion w-full">
                <div class="flex justify-start">
                    <h2 class="text-[--color-primario]">TeatroGest</h2>
                </div>
                <div>
                    <!-- Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto -->
                    <!-- Texto introductorio -->
                    <p class="home-texto-bienvenida leading-relaxed p-1">
                        <div class="xl:hidden h-full py-2 relative overflow-hidden md:float-right items-center md:pl-8 xl:px-4 min-w-[300px] max-w-[450px]">
                            <img src="{{ asset('/img/fondo-inicio.jpg') }}" alt="Teatro"/>
                        </div>
                        Bienvenidos a <b>TeatroGest</b> 🎭

                        Aplicación para la gestión de reservas de espacios teatrales, dedicado a la magia del
                        espectáculo, donde el arte y la cultura cobran vida.

                        ¡Encuentra tu espacio para poder vivir el espectáculo con nosotros! 🎶✨
                    </p>
                </div>
            </section>
        </div>

        <div class="contenedor-reseñas mt-[20px] min-w-[300px] h-[280px] max-w-[1200px] 2xl:mt-10 overflow-hidden">
            <div>
                <!-- Reseñas BUSCAR API -->
                <div class="flex items-start ml-5">
                    <h2 class="text-[--color-primario]">Reseñas</h2>
                </div>

                <!-- Elfsight Google Reviews | Untitled Google Reviews -->
                <section class="flex">
                    <!-- <script src="https://static.elfsight.com/platform/platform.js" async></script>
                    <div class="elfsight-app-3f894ccc-f643-4019-935b-cff19c55c358" data-elfsight-app-lazy></div> -->
                </section>
            </div>
        </div>
    </div>

    <!-- Columna derecha: fondo borroso -->
    <div class="hidden xl:flex h-full relative items-center justify-center pl-8 xl:px-4 min-w-[300px] max-w-[1000px]">
        <img src="{{ asset('/img/fondo-inicio.jpg') }}" alt="Teatro" class="min-w-[300px] xl:h-[500px] 3xl:h-[800px] h-full object-cover" />
    </div>
</div>

@endsection
