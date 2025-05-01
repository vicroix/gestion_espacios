<?php $__env->startSection('title', 'Proximos eventos'); ?>
<!-- http://localhost/TeatroGest/public/nuevas-reservas -->
<?php echo app('Illuminate\Foundation\Vite')('resources/css/nuevas-reservas.css'); ?>
<?php $__env->startSection("main"); ?>

<main class="flex-grow bg-white">
    <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col md:flex-row">
        <!-- Sidebar de filtros -->
        <aside class="md:w-64 shadow-md">
            <h2 id="h2" @click="openFiltros = !openFiltros">
                <svg id="filtros-icono" class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2H3V4zM3 8h18M3 12h18M3 16h18M3 20h18" />
                </svg>
                Filtros
            </h2>

            <form method="GET" action="<?php echo e(route('buscar-sala')); ?>" class="space-y-6">
                <!-- Ciudades -->
                <div>
                    <h3 id="h3" @click="openCiudades = !openCiudades">
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

                <!-- Tipo de sala -->
                <div>
                    <h3 id="h3" @click="openTipo = !openTipo">
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

                <!-- Capacidad (AFORO) -->
                <div>
                    <h3 id="h3" @click="openAforo = !openAforo">
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
                    <h3 id="h3" @click="openFiltros = !openFiltros">
                        Filtros
                        <span x-show="!openFiltros">+</span>
                        <span x-show="openFiltros">-</span>
                    </h3>
                    <div x-show="openFiltros" x-transition>
                        <!-- Equipamiento -->
                        <div>
                            <h3 id="h3">Equipamiento</h3>
                            <input type="text" name="equipamiento" value="<?php echo e(request()->input('equipamiento')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre del teatro -->
                        <div>
                            <h3 id="h3">Nombre del teatro</h3>
                            <input type="text" name="nombre" value="<?php echo e(request()->input('nombre')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Dirección -->
                        <div>
                            <h3 id="h3">Dirección</h3>
                            <input type="text" name="direccion" value="<?php echo e(request()->input('direccion')); ?>" class="w-full border rounded p-2">
                        </div>

                        <!-- Nombre de sala -->
                        <div>
                            <h3 id="h3">Nombre de sala</h3>
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
        <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5">
            <?php $__currentLoopData = $espacios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espacio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative h-[150px] md:h-[180px] group cursor-pointer" tabindex="0">

                <div class="bg-white rounded-xl shadow p-3 border-t-4 border-[#990000] lg:h-[180px] lg:w-[300px]">
                    <div class="lg:h-[100px]">
                        <h4 class="text-lg font-semibold text-[#990000]"><?php echo e($espacio->nombre); ?></h4>
                        <p class="text-sm text-gray-700">Localidad: <?php echo e($espacio->localidad); ?></p>
                        <p class="text-sm text-gray-700 truncate">Dirección: <?php echo e($espacio->direccion); ?></p>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo e(route('detalle-espacio',['id'=> $espacio->idespacios] )); ?>" class="inline-flex items-center button-ver-buscarSala">
                            Ver
                            <svg class="ml-2 w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Detalle aparece abajo, ligeramente a la derecha -->
                <div class="contenedor-mas-detalles top-[100px] left-[180px] -translate-x-1/4 mt-2 shadow-lg group-hover:opacity-100 group-focus-within:opacity-100">
                    <p><strong>Direccion:</strong> <?php echo e($espacio->direccion); ?></p>
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