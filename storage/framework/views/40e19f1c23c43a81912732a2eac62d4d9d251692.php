<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/css/gestion-reservas.css']); ?>
<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

<?php $__env->startSection("main"); ?>
<main class="flex flex-col justify-start w-full items-center sm:mt-[50px] gap-4 lg:gap-12 px-4 lg:px-[150px]">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-4xl text-2xl">Gestión de reservas</h3>
        </div>
    </div>
<!-- Reservas -->
 <div class="flex justify-start w-full">
     <section class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 4xl:grid-cols-6 gap-4">
         <?php if(isset($reservas) && $reservas->isNotEmpty()): ?>
             <?php $__currentLoopData = $reservas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="relative md:h-[180px] group cursor-pointer" tabindex="0">
                 <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[180px] lg:w-[280px] flex flex-col justify-between">
                     <div>
                         <h4 class="text-lg font-semibold text-[#990000] gap-2 flex items-center justify-between">
                             <?php echo e($reserva->nombre); ?>

                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-800 group-hover:hidden" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="text-gray-500 hidden group-hover:block" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                            </svg>
                         </h4>
                         <p class="text-sm text-gray-700 truncate">Fecha: <?php echo e($reserva->fecha); ?></p>
                         <p class="text-sm text-gray-700">Hora: <?php echo e($reserva->hora); ?></p>
                     </div>
                     <div class="mt-3 flex gap-2">
                         <form action="<?php echo e(route('editar-reserva', ['id' => $reserva->idreservas])); ?>" method="GET">
                             <button type="submit" class="button-primary-auto">Editar</button>
                         </form>
                         <form method="POST" action="<?php echo e(route('eliminar-reserva', ['id' => $reserva->idreservas])); ?>" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">
                             <?php echo csrf_field(); ?>
                             <?php echo method_field('DELETE'); ?>
                             <button type="submit" class="button-secundary-auto">Anular</button>
                         </form>
                     </div>
                 </div>

                 <!-- Detalle aparece al hover/focus -->
                 <div
                     class="contenedor-mas-detalles absolute top-[50px] left-[205px] -translate-x-1/4 mt-2 bg-white p-3 rounded-xl shadow-lg opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity">
                     <p><strong>Localidad:</strong> <?php echo e($reserva->localidad); ?></p>
                     <p><strong>Dirección:</strong> <?php echo e($reserva->direccion); ?></p>
                     <p><strong>Código Postal:</strong> <?php echo e($reserva->codigopostal); ?></p>
                     <p><strong>Hora:</strong> <?php echo e($reserva->hora); ?></p>
                     <p><strong>Fecha:</strong> <?php echo e($reserva->fecha); ?></p>
                 </div>
             </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php else: ?>
             <p class="col-span-full text-center">No tienes ninguna reserva pendiente, ve a <a href="<?php echo e(url('buscar-sala')); ?>" class="hover:text-[#990000] font-semibold">nuevas reservas</a></p>
         <?php endif; ?>
     </section>
 </div>
    <!-- Mensaje de error o ok si funciona -->
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