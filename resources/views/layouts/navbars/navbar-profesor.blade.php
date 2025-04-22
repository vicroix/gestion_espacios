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
        <button @click="open = !open" class="text-[#990000] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <span class="text-[#990000]">{{ session('usuario') }}</span>
            </span>
            <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>

            <div class="flex gap-3 border-2 border-[#990000] rounded-xl relative">
                <!-- Dropdown -->
                <div class="relative group" @mouseenter="showDropdown = true" @mouseleave="showDropdown = false">
                    <button class="px-4 py-2 hover:bg-[#990000] border border-white group-hover:bg-[#990000] group-hover:text-white rounded-xl transition-all duration-300 ease-out">
                        Reservas
                    </button>
                    <div x-show="showDropdown" x-transition class="absolute bg-white border border-[#990000] left-0 w-full rounded-xl mt-1 z-10">
                        <a href="{{ url('gestion-reservas') }}" class="block px-4 py-2 hover:bg-[#990000] hover:text-white transition rounded-b-xl">Gestión reservas</a>
                    </div>
                </div>

                <a href="{{ url('proximos-eventos') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">
                    Próximos eventos
                </a>
                <a href="{{ url('faq') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">
                    FAQ
                </a>
            </div>

            <a href="{{ route('salir') }}" class="bg-[#990000] hover:bg-[#a84848] text-white px-2 py-2.5 rounded-lg cursor-pointer">
                Cerrar sesión
            </a>
        </div>
    </div>

    <!-- Menú desplegable para móvil -->
    <div x-show="open" x-transition class="absolute top-full left-0 w-full bg-white shadow-md rounded-b-xl md:hidden flex flex-col items-center gap-4 py-4 px-8 z-10">
        <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>
        <span class="navbar-text text-center">
            <span class="block">Bienvenido <span class="font-semibold">{{ session('nombre_rol') }}</span></span>
            <span class="block text-[#990000]">{{ session('usuario') }}</span>
        </span>
        <a href="{{ url('gestion-reservas') }}" class="text-[#990000] font-semibold">Gestión reservas</a>
        <a href="{{ url('proximos-eventos') }}" class="text-[#990000] font-semibold">Próximos eventos</a>
        <a href="{{ url('faq') }}" class="text-[#990000] font-semibold">FAQ</a>
        <a href="{{ route('salir') }}" class="bg-[#990000] text-white px-4 py-2 rounded-lg w-full text-center">Cerrar sesión</a>
    </div>
</div>
