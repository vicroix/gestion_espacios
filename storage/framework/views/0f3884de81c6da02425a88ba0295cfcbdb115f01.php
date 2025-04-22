

<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/prueba-laravel/public -->

<?php $__env->startSection("main"); ?>
<main class="flex content-center md:block">
    <!--Documentación del calendario: https://fullcalendar.io/docs -->
    <div id="calendario" class="flex align-center"></div>
</main>

<script src="<?php echo e(asset('fullCalendar/index.global.min.js')); ?>"></script>
<script src="<?php echo e(asset('fullCalendar/calendario.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/proximos-eventos.blade.php ENDPATH**/ ?>