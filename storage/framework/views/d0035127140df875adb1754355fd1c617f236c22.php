<!-- Imagen decorativa del nav -->
<div class="absolute inset-0 flex justify-center pointer-events-none z-0 h-[100px] contenedor-decoration-navbar">
    <img src="<?php echo e(asset('img/deco-nav.png')); ?>" alt="img nav" class="h-[35px] hidden md:block w-auto">
</div>

<!-- Navbar principal -->
<div x-data="{ abrir: false }" class="relative z-10 px-4 md:mt-10 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 z-20">
        <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo" class="h-[50px]">
    </div>

    <!-- Botón hamburguesa para móviles -->
    <div class="md:hidden z-20">
        <button @click="abrir = !abrir" class="text-[#990000] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg-home-navbar" fill="currentColor"
                viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': abrir, 'block': !abrir }" class="block" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'block': abrir, 'hidden': !abrir }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Escritorio -->
    <div class="hidden md:flex flex-col items-end self-end gap-2 mt-2 md:gap-2">
        <div class="flex gap-4 items-center">
            <span class="navbar-text flex mr-2">
                <span>Bienvenido</span>
                <span class="mx-2 font-semibold"><?php echo e(session('nombre_rol')); ?></span>
                <span class="text-[#990000]"><?php echo e(session('usuario')); ?></span>
            </span>
            <a href="<?php echo e(url('/')); ?>" class="animation-scale"><svg width="20" class="svg-home-navbar" height="20" viewBox="0 0 42 36" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
                </svg>
            </a>
            <!-- Reservas, Salas, Próximos eventos y Faq -->
            <?php echo $__env->make('layouts.navbars.navbars-menu.navbars-menu-admin.navbar-menu-escritorio-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(route('salir')); ?>" class="button-primary-auto cursor-pointer md:text-base">Cerrar sesión</a>
        </div>
    </div>

    <!-- Menú móvil -->
    <?php echo $__env->make('layouts.navbars.navbars-menu.navbars-menu-admin.navbar-menu-movil-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\Users\Victor\Documents\GitHub\TeatroGest\resources\views/layouts/navbars/navbar-admin.blade.php ENDPATH**/ ?>