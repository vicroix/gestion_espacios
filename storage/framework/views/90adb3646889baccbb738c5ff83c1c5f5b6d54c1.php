<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet"/>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/busquedas-salas -->

<?php $__env->startSection("main"); ?>
<main class="m-4">
    <h1 class="text-[#990000] self-start">Búsqueda de sala</h1>
    <hr class="text-[#990000]">

    <section class="flex flex-col items-center justify-center gap-9">
        <!--Listado este listado hay que conectarlo con la BBDD para conectarlo-->
        <div>
            <select class="w-80 border-2 rounded-lg mt-9">
                <option value="1">Sala 1</option>
                <option value="2">Sala 2</option>
                <option value="3">Sala 3</option>
            </select>
        </div>
        <!--Mapa interactivo-->
        <div class="w-[800px] h-[500px] shadow">
            <div id="contenedor-del-mapa" class="absolute w-[800px] h-[500px]"></div>
        </div>
        <div>
            <a href="<?php echo e(url('pago')); ?>"
                class="bg-[#990000] hover:bg-[#a84848] text-white p-2 rounded-lg w-auto mx-auto my-8 cursor-pointer">Reservar</a>
        </div>
    </section>

</main>
<script src="<?php echo e(asset('mapa/mapa.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/busquedas-salas.blade.php ENDPATH**/ ?>