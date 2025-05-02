<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/css/inicio.css']); ?>
<!-- <?php echo app('Illuminate\Foundation\Vite')('resources/css/inicio.css'); ?> -->
<?php $__env->startSection('title', 'Inicio'); ?>
<!-- http://localhost/teatrogest/public -->

<?php $__env->startSection('main'); ?>
<main class="xl:mx-10 gap-3 items-center justify-start 2xl:mt-5">
    <div class="w-[90%]">
        <!--Sección principal de presentación de la aplicación-->
        <section class="section-presentacion">
            <div class="flex justify-start">
                <h1 class="text-[#990000]">TeatroGest</h1>
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
    <div class="contenedor-reseñas mt-[20px] w-[90%] 2xl:mt-10 xl:w-[1200px]">
        <div>
            <!--Reseñas BUSCAR API-->
            <div class="flex items-start ml-5">
                <h1 class="text-[#990000]">Reseñas</h1>
            </div>
            <!-- Elfsight Google Reviews | Untitled Google Reviews -->
            <section class="flex">
                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                <div class="elfsight-app-950d3ce1-1b66-4612-9a4c-0ff6b225647f" data-elfsight-app-lazy></div>
            </section>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/inicio.blade.php ENDPATH**/ ?>