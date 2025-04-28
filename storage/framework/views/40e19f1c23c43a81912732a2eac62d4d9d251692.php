<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<?php $__env->startSection("main"); ?>
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">PANEL DE GESTIÓN DE RESERVAS</h3>
    </div>
    <div class="flex justify-center overflow-auto mb-10 flex-1 max-h-[470px]">
        <!-- Si $espaci  os que viene Controllers/GestionSalas es distinto de null o vacío, muestra los registros  -->
        <?php if(isset($reservas) && !$reservas->isEmpty()): ?>
        <ul class="list-none">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="border rounded-xl p-2 mb-2">
                <h5 class="font-semibold"><?php echo e($reserva->nombre); ?></h5>
                <p>Localidad: <?php echo e($reserva->localidad); ?></p>
                <p>Dirección: <?php echo e($reserva->direccion); ?></p>
                <p>Código Postal: <?php echo e($reserva->codigopostal); ?></p>
                <p>Capacidad: <?php echo e($reserva->capacidad); ?></p>
                <p>Tipo: <?php echo e($reserva->tipo); ?></p>
                <p>Sala: <?php echo e($reserva->nombre_sala); ?></p>
                <p hidden><?php echo e($reserva->idespacios); ?></p>
                <div class="w-full flex mt-2 justify-center">
                    <!-- Enviar datos de vuelta por parámetro a js/nuevas-reservas.js -->
                    <button
                        type="button"
                        onclick="rellenarFormulario(
                    '<?php echo e($reserva->nombre); ?>',
                    '<?php echo e($reserva->localidad); ?>',
                    '<?php echo e($reserva->codigopostal); ?>',
                    '<?php echo e($reserva->capacidad); ?>',
                    '<?php echo e($reserva->tipo); ?>',
                    '<?php echo e($reserva->idespacios); ?>',
                )"
                        class="button-primary-auto">
                        Seleccionar
                    </button>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/gestion-reservas.blade.php ENDPATH**/ ?>