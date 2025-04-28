<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<?php $__env->startSection("main"); ?>
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">PANEL DE GESTIÓN DE RESERVAS</h3>
    </div>
    <div class="flex justify-center overflow-auto mb-10">
        <?php if(isset($reservas) && !$reservas->isEmpty()): ?>
        <ul class="flex flex-row gap-4 list-none">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="border rounded-xl p-4 min-w-[300px] flex-shrink-0 overflow-auto">
                <h5 class="font-semibold"><?php echo e($reserva->nombre); ?></h5>
                <p>Localidad: <?php echo e($reserva->localidad); ?></p>
                <p>Dirección: <?php echo e($reserva->direccion); ?></p>
                <p>Código Postal: <?php echo e($reserva->codigopostal); ?></p>
                <p>Hora: <?php echo e($reserva->hora); ?></p>
                <p>Fecha: <?php echo e($reserva->fecha); ?></p>
                <p hidden><?php echo e($reserva->idespacios); ?></p>
                <div class="w-full flex mt-3 justify-center">
                    <a href="<?php echo e(route('editar-reserva', ['id' => $reserva->idreservas])); ?>" class="button-primary-auto">
                        Editar
                    </a>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
    </div>

    <div class="text-center mb-10">
        <?php if(session('correcto')): ?>
        <p class="text-green-500"><?php echo e(session('correcto')); ?></p>
        <?php elseif(session('sinDatos')): ?>
        <p class=""><?php echo e(session('sinDatos')); ?></p>
        <?php else: ?>
        <p class="text-red-500"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/gestion-reservas.blade.php ENDPATH**/ ?>