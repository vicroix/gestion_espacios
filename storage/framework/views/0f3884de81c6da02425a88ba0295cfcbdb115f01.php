<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/teatrogest/public/proximos-eventos -->

<?php $__env->startSection("main"); ?>
<main class="flex content-center md:block">
    <!--Documentación del calendario: https://fullcalendar.io/docs -->
    <div id="calendario" class="flex align-center"></div>
    <div id="detalles" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.8); color: white; padding: 20px; z-index: 9999; border-radius: 10px; width: 300px; text-align: center;">
        <h3 id="detallesTitulo"></h3>
        <p id="localidad"></p>
        <p id="direccion"></p>
        <p id="hora"></p>
        <p id="horaFin"></p>
        <button onclick="cerrarPopup()">Cerrar</button>
    </div>
</main>
<script>
    // Asignar las rutas relativas
    window.rutaFestivos = "<?php echo e(asset('fullCalendar/calendario-2025.json')); ?>";
    window.rutaReservas = "<?php echo e(url('api/eventos')); ?>";
</script>
<script src="<?php echo e(asset('fullCalendar/index.global.min.js')); ?>"></script>
<script src="<?php echo e(asset('fullCalendar/calendario.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/proximos-eventos.blade.php ENDPATH**/ ?>