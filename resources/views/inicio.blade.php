@extends('layouts.plantilla')

@vite('resources/css/app.css')
@section('title', 'Inicio')
<!-- http://localhost/teatrogest/public -->

@section('main')
<main class="flex flex-col items-center lg:flex lg:flex-row sm:mt-[50px] gap-4 xl:gap-12 justify-center">
    <div class="sm:ml-12 sm:pl-4 rounded-bl-2xl lg:w-[80%] ">
        <!--Sección principal de presentación de la aplicación-->
        <section class="w-[340px] h-full sm:w-[400px] sm:h-[300px] md:w-full md:h-[250px] lg:w-[490px] lg:h-[350px] xl:w-[550px] xl:h-[413px] flex flex-col border-l-[10px] px-4 sm:px-5 border-t-[1px] rounded-bl-2xl rounded-tr-2xl border-[#990000]">
            <div class="flex justify-start">
                <h1 class="text-[#990000]">TeatroGest</h1>
            </div>
            <div>
                <!--Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto-->
                <!--Texto introductorio-->
                <p class="home-texto-bienvenida leading-relaxed float-left">Bienvenidos a <b>TeatroGest</b> 🎭
                    <img src="img/sillones.jpg" alt="sillones teatro" class="float-right p-3 w-[190px] sm:w-[250px]">
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
    <div class="w-[340px] md:mx-12 lg:mr-12 lg:w-[500px] xl:w-[800px]">
        <div class="border-r-[10px] border-b-[1px] rounded-bl-2xl rounded-tr-2xl border-[#990000]">
            <!--Reseñas BUSCAR API-->
            <div class="flex items-start ml-5 md:mx-10">
                <h1 class="text-[#990000]">Reseñas</h1>
            </div>
            <!-- Elfsight Google Reviews | Untitled Google Reviews -->
            <section class="flex lg:pr-15 xl:pr-3">
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-950d3ce1-1b66-4612-9a4c-0ff6b225647f" data-elfsight-app-lazy></div>
            </section>
        </div>
    </div>
</main>
@endsection
