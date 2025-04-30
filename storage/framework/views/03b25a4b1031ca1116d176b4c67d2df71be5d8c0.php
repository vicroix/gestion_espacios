<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->

<?php $__env->startSection("main"); ?>

<!--flex-grow empuja el footer hacia abajo-->
<main class="flex-grow bg-white my-5 mx-2">
    <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col md:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="md:w-64 h-full w-full bg-gray-100 p-4 rounded-xl shadow-md">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 cursor-pointer" @click="openFiltros = !openFiltros">
                <svg id="filtros-icono" class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2H3V4zM3 8h18M3 12h18M3 16h18M3 20h18" />
                </svg>
                Filtros
            </h2>

            <form method="GET" action="<?php echo e(route('buscar-sala')); ?>" class="space-y-6">
                <!-- CIUDADES -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-2 cursor-pointer" @click="openCiudades = !openCiudades">
                        Ciudades
                        <span x-show="!openCiudades">+</span>
                        <span x-show="openCiudades">-</span>
                    </h3>
                    <div x-show="openCiudades" x-transition>
                        <?php $__currentLoopData = ['Madrid', 'Barcelona', 'Sevilla', 'Málaga', 'Granada', 'Huelva', 'Valencia', 'Cádiz', 'Tarragona', 'Cádiz', 'Salamanca', 'León']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciudad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="block text-sm text-gray-600">
                            <input type="checkbox" name="ciudades[]" value="<?php echo e($ciudad); ?>" class="mr-2">
                            <?php echo e($ciudad); ?>

                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- TIPO DE SALA -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-2 cursor-pointer" @click="openTipo = !openTipo">
                        Tipo de sala
                        <span x-show="!openTipo">+</span>
                        <span x-show="openTipo">-</span>
                    </h3>
                    <div x-show="openTipo" x-transition>
                        <?php $__currentLoopData = ['Obra', 'Ensayo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="block text-sm text-gray-600">
                            <input type="radio" name="tipo" value="<?php echo e(strtolower($tipo)); ?>" class="mr-2">
                            <?php echo e($tipo); ?>

                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- CAPACIDAD (AFORO) -->
                <div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-2" @click="openAforo = !openAforo">
                        Aforo
                        <span x-show="!openAforo">+</span>
                        <span x-show="openAforo">-</span>
                    </h3>
                    <?php $__currentLoopData = ['10' => 'Hasta 10 personas', '20' => 'Hasta 20 personas', '30' => 'Hasta 30 personas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="block text-sm text-gray-600" x-show="openAforo">
                        <input type="radio" name="capacidad" value="<?php echo e($valor); ?>" class="mr-2">
                        <?php echo e($label); ?>

                    </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- + Filtros -->
                <div class="mt-4">
                    <h3 class="text-sm font-semibold text-gray-700 mb-2 cursor-pointer" @click="openFiltros = !openFiltros">
                        Filtros
                        <span x-show="!openFiltros">+</span>
                        <span x-show="openFiltros">-</span>
                    </h3>
                    <div x-show="openFiltros" x-transition>
                        <!-- Equipamiento -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Equipamiento</h3>
                            <input type="text" name="equipamiento" value="<?php echo e(request()->input('equipamiento')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre del teatro -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Nombre del teatro</h3>
                            <input type="text" name="nombre" value="<?php echo e(request()->input('nombre')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Dirección</h3>
                            <input type="text" name="direccion" value="<?php echo e(request()->input('direccion')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre de sala -->
                        <div>
                            <h3 class="text-sm font-semibold text-gray-700 mb-2">Nombre de sala</h3>
                            <input type="text" name="nombre_sala" value="<?php echo e(request()->input('nombre_sala')); ?>" class="w-full border rounded p-2">
                        </div>
                    </div>
                </div>

                <!-- Botón de búsqueda -->
                <button type="submit" class="button-primary-auto w-full">
                    Buscar
                </button>
            </form>
        </aside>

        <!-- Resultados -->
        <section class="p-4 grid w-full grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3 3xl:grid-cols-4 gap-6">
            <?php $__currentLoopData = $espacios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espacio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative group cursor-pointer" tabindex="0">

                <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[150px] lg:w-[400px]">
                    <h4 class="text-lg font-semibold text-[#990000]"><?php echo e($espacio->nombre); ?></h4>
                    <p class="text-sm text-gray-700">Localidad: <?php echo e($espacio->localidad); ?></p>
                    <p class="text-sm text-gray-700 truncate">Dirección: <?php echo e($espacio->direccion); ?></p>
                    <div class="mt-3">
                        <a href="<?php echo e(route('detalle-espacio', $espacio->idespacios)); ?>" class="inline-flex items-center button-ver-buscarSala">
                            Ver
                            <svg class="ml-2 w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="absolute left-[100px] -translate-y-[65px] sm:left-1/2 sm:-translate-x-1/2 sm:top-1/2 sm:translate-y-[10px] w-64 bg-gray-100 text-gray-800 text-sm p-2 rounded shadow-lg opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-300 z-10 pointer-events-none">
                    <p><strong>Tel:</strong> <?php echo e($espacio->telefono); ?></p>
                    <p><strong>Tipo:</strong> <?php echo e($espacio->tipo); ?></p>
                    <p><strong>Capacidad:</strong> <?php echo e($espacio->capacidad); ?></p>
                    <p><strong>Equipamiento:</strong> <?php echo e($espacio->equipamiento); ?></p>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
    </div>
</main>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/nuevas-reservas.js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/nuevas-reservas.blade.php ENDPATH**/ ?>