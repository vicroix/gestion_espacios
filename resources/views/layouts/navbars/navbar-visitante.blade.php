<!-- Imagen decorativa del nav -->
<div class="absolute inset-0 flex justify-center pointer-events-none z-0">
    <img src="{{ asset('img/deco-nav.png') }}" alt="img nav" class="h-[35px] hidden md:block md:w-auto">
</div>

<!-- Navbar principal -->
<div x-data="{ open: false }" class="relative z-10 px-4 md:mt-10 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 z-20">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="h-[50px]">
    </div>

    <!-- Botón hamburguesa para móviles -->
    <div class="md:hidden z-20">
        <button @click="open = !open" class="text-[--color-primario] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg-home-navbar" fill="currentColor"
                viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{'hidden': open, 'block': !open}" class="block" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'block': open, 'hidden': !open}" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Escritorio -->
    <div class="hidden md:flex gap-4 items-center">
        <a href="{{ url('/') }}" class="animation-scale svg-home-navbar" title="Inicio">
            <svg width="25" height="25" viewBox="0 0 42 36" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
            </svg>
        </a>
        <!-- Menú próximos eventos y FAQ -->
        @include('layouts.navbars.navbars-menu.navbars-menu-visiante.navbar-menu-escritorio-visitante')

        <div class="flex items-center gap-3">
            <!-- Botón registro -->
            <a href="{{ url('form-registro') }}"
                class="button-secundary-auto">Registro
            </a>
            <!-- Botón inicio sesión -->
            <button id="openLoginBtn"
                class="button-primary-login flex items-center" title="Iniciar sesión">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M23 12c0 3.345-1.493 6.342-3.85 8.36A10.96 10.96 0 0 1 12 23c-2.73 0-5.227-.994-7.15-2.64A10.98 10.98 0 0 1 1 12C1 5.925 5.925 1 12 1s11 4.925 11 11m-7-3.5a4 4 0 1 0-8 0a4 4 0 0 0 8 0m2.5 9.725V18a4 4 0 0 0-4-4h-5a4 4 0 0 0-4 4v.225q.31.323.65.615A8.96 8.96 0 0 0 12 21a8.96 8.96 0 0 0 6.5-2.775" />
                    </svg>
                </div>
            </button>
        </div>
    </div>

    <!-- Menú desplegable para móviles -->
    @include('layouts.navbars.navbars-menu.navbars-menu-visiante.navbar-menu-movil-visitante')
</div>
@vite(['resources/js/inicio.js'])
