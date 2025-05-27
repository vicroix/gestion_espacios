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
<div class="flex justify-center items-center h-full bg-[#000314] -z-20 backdrop-blur-xl">
    <video class="fixed top-50 left-50 w-[2200px] h-[800px] object-cover backdrop-blur-xl rounded-md -z-10 pointer-events-none md:block" autoplay muted loop>
        <source src="video/canvaedit.mp4" type="video/mp4">
        Tu navegador no soporta el video HTML5.
    </video>
    <div class="flex flex-col h-full items-center z-10 bg-transparent mt-12">
        <div class="w-[90%]">
            <!--Sección principal de presentación de la aplicación-->
            <section class="section-presentacion backdrop-blur-2xl bg-white/40">
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
        <div class="contenedor-reseñas mt-[20px] w-[90%] 2xl:mt-10 xl:w-[1000px] backdrop-blur-2xl bg-white/40">
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
    </div>
</div>
@endsection
