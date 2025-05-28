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

<div class="flex flex-col h-full items-center z-10 bg-transparent mt-3">
    <div class="w-[90%]">
        <!--Sección principal de presentación de la aplicación-->
        <section class="section-presentacion 4xl:w-[50vw]">
            <div class="flex justify-start">
                <h2 class="text-[--color-primario]">TeatroGest</h1>
            </div>
            <div>
                <!--Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto-->
                <!--Texto introductorio-->
                <p class="home-texto-bienvenida leading-relaxed float-left">Bienvenidos a <b>TeatroGest</b> 🎭
                    <video class="float-right px-2 w-[190px] sm:w-[320px] 4xl:w-[640px] 4xl:h-[300px]" autoplay muted loop>
                        <source src="{{ asset('video/canvaedit.mp4') }}">
                    </video>
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


    @endsection
