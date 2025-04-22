@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Inicio')
<!-- http://localhost/teatrogest/public -->

@section("main")
<main class="flex flex-col w-full justify-center mt-10% sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <!--Título H1 - TEATROGEST-->
    <div class="flex justify-start mx-10 sm:mx-24">
        <h1 class="text-[#990000]">TeatroGest</h1>
    </div>

    <!--Sección principal de presentación de la aplicación-->
    <section class="flex mx-10 sm:mx-24">

        <div>
            <!--Imagen de sillones de teatro (se puede modificar por la que desee el cliente) pendiente de alinear con texto-->
            <img src="img/sillones.jpg" alt="sillones teatro" class="home-img-bienvenida">
            <!--Texto introductorio-->
            <p class="home-texto-bienvenida leading-relaxed">Bienvenidos a <b>TeatroGest</b> 🎭
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
    <!--Reseñas BUSCAR API-->
    <div class="flex items-start mx-10 sm:mx-24">
        <h1 class="text-[#990000]">Reseñas</h1>
    </div>
    <section class="flex justify-center sm:mx-24">
    </section>
</main>
@endsection
