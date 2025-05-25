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
        <a href="{{ url('/') }}" class="animation-scale svg-home-navbar {{ Request::is('/') ? 'bg-[--color-eventos]' : '' }}" title="Inicio">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                <path fill="currentColor" d="M20 10a1 1 0 1 0-2 0zM6 10a1 1 0 0 0-2 0zm14.293 2.707a1 1 0 0 0 1.414-1.414zM12 3l.707-.707a1 1 0 0 0-1.414 0zm-9.707 8.293a1 1 0 1 0 1.414 1.414zM7 22h10v-2H7zm13-3v-9h-2v9zM6 19v-9H4v9zm15.707-7.707l-9-9l-1.414 1.414l9 9zm-10.414-9l-9 9l1.414 1.414l9-9zM17 22a3 3 0 0 0 3-3h-2a1 1 0 0 1-1 1zM7 20a1 1 0 0 1-1-1H4a3 3 0 0 0 3 3z" />
            </svg>
        </a>
        <!-- Menú próximos eventos y FAQ -->
        @include('layouts.navbars.navbars-menu.navbars-menu-visiante.navbar-menu-escritorio-visitante')

        <div class="flex items-center gap-3">
            <!-- Botón inicio sesión -->
            <button id="openLoginBtn"
                class="button-primary-login flex items-center" title="Iniciar sesión">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
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
