<!-- Imagen decorativa del nav -->
<div class="absolute inset-0 flex justify-center pointer-events-none h-[100px] contenedor-decoration-navbar z-0">
    <img src="{{ asset('img/deco-nav.png') }}" alt="Imagen decorativa del nav" class="h-[35px] w-auto hidden md:block">
</div>

<!-- Navbar principal -->
<div x-data="{ open: false, showDropdown: false }" class="relative z-10 px-4 md:mt-10 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 z-20">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="h-[50px]">
    </div>

    <!-- Botón hamburguesa para móviles -->
    <div class="md:hidden z-20">
        <button @click="open = !open" class="text-[--color-primario] focus:outline-none">
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
                <span class="mx-2 font-semibold">{{ session('nombre_rol') }}</span>
                <span class="text-[--color-primario]">{{ session('usuario') }}</span>
            </span>
            <!--Botón HOME-->
            <a href="{{ url('/') }}" class="animation-scale svg-home-navbar" title="Inicio">
            <svg width="25" height="25" viewBox="0 0 42 36" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
            </svg>
        </a>
            <!-- Reservas, Próximos eventos y Faq -->
            @include('layouts.navbars.navbars-menu.navbars-menu-profe.navbar-menu-escritorio-profe')
            <!-- Botón cerrar sesión -->
            <a href="{{ route('salir') }}" class="button-logout cursor-pointer md:text-base" title="Cerrar sesión">
                 <svg xmlns="http://www.w3.org/2000/svg" width="34" height="32" class="pr-[2px]" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 15l3-3m0 0l-3-3m3 3H4m5-4.751V7.2c0-1.12 0-1.68.218-2.108c.192-.377.497-.682.874-.874C10.52 4 11.08 4 12.2 4h4.6c1.12 0 1.68 0 2.107.218c.377.192.683.497.875.874c.218.427.218.987.218 2.105v9.607c0 1.118 0 1.677-.218 2.104a2 2 0 0 1-.875.874c-.427.218-.986.218-2.104.218h-4.606c-1.118 0-1.678 0-2.105-.218a2 2 0 0 1-.874-.874C9 18.48 9 17.92 9 16.8v-.05" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Menú desplegable para móvil -->
    @include('layouts.navbars.navbars-menu.navbars-menu-profe.navbar-menu-movil-profe')
</div>
