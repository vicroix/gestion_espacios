<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<?php $__env->startSection("main"); ?>
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 lg:gap-12 px-4 lg:px-[150px] h-[59vh]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Gestión de reservas</h3>
        </div>
    </div>

    <div class="flex justify-center mb-10 overflow-y-auto max-h-[350px] w-full">
        <?php if(isset($reservas) && !$reservas->isEmpty()): ?>
        <ul class="flex flex-col sm:flex-row gap-4 list-none w-full sm:w-max sm:overflow-x-auto sm:scroll-smooth">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="border rounded-xl p-4 min-w-full sm:min-w-[300px] flex-shrink-0">
                <h5 class="font-semibold"><?php echo e($reserva->nombre); ?></h5>
                <p>Localidad: <?php echo e($reserva->localidad); ?></p>
                <p>Dirección: <?php echo e($reserva->direccion); ?></p>
                <p>Código Postal: <?php echo e($reserva->codigopostal); ?></p>
                <p>Hora: <?php echo e($reserva->hora); ?></p>
                <p>Fecha: <?php echo e($reserva->fecha); ?></p>
                <p hidden><?php echo e($reserva->idespacios); ?></p>
                <div class="w-full flex gap-3 mt-3 justify-center items-center">
                    <form action="<?php echo e(route('editar-reserva', ['id' => $reserva->idreservas])); ?>" method="GET" class="m-0">
                        <button type="submit" class="button-primary-auto">Editar</button>
                    </form>
                    <form method="POST" action="<?php echo e(route('eliminar-reserva', ['id' => $reserva->idreservas])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')" class="m-0">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="button-secundary-auto">Anular</button>
                    </form>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php else: ?>
        <p class="">No tienes ninguna reserva pendiente, ve a <a href="<?php echo e(url('nuevas-reservas')); ?>" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
        <?php endif; ?>
    </div>

    <div class="text-center mb-10">
        <?php if(session('correcto')): ?>
        <p class="text-green-500"><?php echo e(session('correcto')); ?></p>
        <?php elseif(session('sinDatos')): ?>
        <?php else: ?>
        <p class="text-red-500"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/gestion-reservas.blade.php ENDPATH**/ ?>