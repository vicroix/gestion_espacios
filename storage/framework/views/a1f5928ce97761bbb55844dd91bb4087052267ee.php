<!-- Imagen decorativa del nav -->
<div class="absolute inset-0 flex justify-center pointer-events-none h-[100px] contenedor-decoration-navbar z-0">
    <img src="<?php echo e(asset('img/deco-nav.png')); ?>" alt="Imagen decorativa del nav" class="h-[35px] w-auto hidden md:block">
</div>

<!-- Navbar principal -->
<div x-data="{ open: false, showDropdown: false }" class="relative z-10 px-4 md:mt-10 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 z-20">
        <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo" class="h-[50px]">
    </div>

    <!-- Botón hamburguesa para móviles -->
    <div class="md:hidden z-20">
        <button @click="open = !open" class="text-[#990000] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg-home-navbar" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{'hidden': open, 'block': !open}" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'block': open, 'hidden': !open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Escritorio -->
    <div class="hidden md:flex flex-col items-end gap-2 self-end mt-2">
        <div class="flex gap-4 items-center">
            <span class="navbar-text flex mr-2">
                <span>Bienvenido</span>
                <span class="mx-2 font-semibold"><?php echo e(session('nombre_rol')); ?></span>
                <span class="text-[#990000]"><?php echo e(session('usuario')); ?></span>
            </span>
            <a href="<?php echo e(url('/')); ?>" class="animation-scale svg-home-navbar"><svg width="20" height="20" viewBox="0 0 42 36" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
                </svg>
            </a>
            <!-- Reservas, Próximos eventos y Faq -->
            <?php echo $__env->make('layouts.navbars.navbars-menu.navbars-menu-profe.navbar-menu-escritorio-profe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(route('salir')); ?>" class="button-primary-auto cursor-pointer">
                Cerrar sesión
            </a>
        </div>
    </div>

    <!-- Menú desplegable para móvil -->
    <?php echo $__env->make('layouts.navbars.navbars-menu.navbars-menu-profe.navbar-menu-movil-profe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbars/navbar-profesor.blade.php ENDPATH**/ ?>