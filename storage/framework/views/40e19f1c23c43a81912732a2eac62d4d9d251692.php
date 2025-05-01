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
    <div class="flex justify-center mb-10 overflow-y-auto w-full">
        <!-- Si  $reservas esta definida y no es null, crea la vista con los datos de la reserva del usuario -->
        <?php if(isset($reservas) && !$reservas->isEmpty()): ?>
        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 justify-center gap-4 list-none sm:overflow-y-auto sm:scroll-smooth">
            <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li x-data="{openDetalles: false}" class="p-4 flex-shrink-0 min-w-[236.12px] max-w-[236.12px] border-t-4 shadow rounded-xl border-[#990000]">
                <h4 @click="openDetalles = !openDetalles" class="text-lg flex items-center font-semibold text-[#990000] cursor-pointer"><?php echo e($reserva->nombre); ?>

                    <span x-show="!openDetalles" class="rotate-90 -translate-y-[5px]"> <svg class="ml-2 w-4 h-4 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></span>
                    <span x-show="openDetalles" class="-rotate-90 translate-y-[5px]"> <svg class="ml-2 w-4 h-4 text-[#990000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg></span>
                </h4>
                <div x-show="openDetalles">
                    <p>Localidad: <?php echo e($reserva->localidad); ?></p>
                    <p>Dirección: <?php echo e($reserva->direccion); ?></p>
                    <p>Código Postal: <?php echo e($reserva->codigopostal); ?></p>
                </div>
                <label class="flex gap-1 text-[#990000]">Hora:<p class="text-black"><?php echo e($reserva->hora); ?></p></label>
                <label class="flex gap-1 text-[#990000]">Fecha:<p class="text-black"><?php echo e($reserva->fecha); ?></p></label>
                <p hidden><?php echo e($reserva->idespacios); ?></p>
                <div class="w-full flex gap-3 mt-3 justify-center">
                    <form action="<?php echo e(route('editar-reserva', ['id' => $reserva->idreservas])); ?>" method="GET" class="m-0">
                        <button type="submit" class="button-primary-auto">Editar</button>
                    </form>
                    <!--   -->
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
        <p class="">No tienes ninguna reserva pendiente, ve a <a href="<?php echo e(url('buscar-sala')); ?>" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
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