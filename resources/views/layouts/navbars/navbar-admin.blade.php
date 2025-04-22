<!-- Imagen decorativa del nav -->
<div class="absolute inset-0 flex justify-center pointer-events-none z-0 h-[100px] contenedor-decoration-navbar">
    <img src="{{ asset('img/deco-nav.png') }}" alt="img nav" class="h-[35px] hidden md:block w-auto">
</div>

<!-- Navbar principal -->
<div x-data="{ open: false }" class="relative z-10 px-4 md:mt-10 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 z-20">
        <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="h-[50px]">
    </div>

    <!-- Botón hamburguesa para móviles -->
    <div class="md:hidden z-20">
        <button @click="open = !open" class="text-[#990000] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'block': open, 'hidden': !open }" class="hidden" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Escritorio -->
    <div class="hidden md:flex flex-col items-end self-end gap-2 mt-2 md:gap-2">
        <div class="flex gap-4 items-center">
            <span class="navbar-text flex mr-2">
                <span>Bienvenido</span>
                <span class="mx-2 font-semibold">{{ session('nombre_rol') }}</span>
                <span class="text-[#990000]">{{ session('usuario') }}</span>
            </span>
            <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>
            <div class="flex gap-3 border-2 border-[#990000] rounded-xl">
                <!-- Reservas -->
                <div class="relative group">
                    <button class="px-4 py-2 hover:bg-[#990000] border group-hover:bg-[#990000] group-hover:text-white border-white hover:text-white rounded-xl transition-all duration-300 ease-out">
                        Reservas
                    </button>
                    <div class="absolute hidden bg-white border border-[#990000] left-0 w-[154.67px] rounded-xl group-hover:flex flex-col">
                        <a href="{{ url('nuevas-reservas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Nuevas Reservas</a>
                        <a href="{{ url('gestion-reservas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Gestión reservas</a>
                    </div>
                </div>
                <!-- Salas -->
                <div class="relative group">
                    <button class="px-4 py-2 hover:bg-[#990000] border border-white group-hover:bg-[#990000] group-hover:text-white hover:text-white rounded-xl transition-all duration-300 ease-out">
                        Salas
                    </button>
                    <div class="absolute hidden bg-white border border-[#990000] left-0 w-[154.67px] rounded-xl group-hover:flex flex-col">
                        <a href="{{ url('busquedas-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Búsquedas Salas</a>
                        <a href="{{ url('modificar-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Modificar Salas</a>
                    </div>
                </div>
                <a href="{{ url('proximos-eventos') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">Próximos eventos</a>
                <a href="{{ url('faq') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">FAQ</a>
            </div>
            <a href="{{ route('salir') }}" class="bg-[#990000] hover:bg-[#a84848] text-white px-2 py-2.5 rounded-lg cursor-pointer md:text-base">Cerrar sesión</a>
        </div>
    </div>

    <!-- Menú móvil -->
    <div x-show="open"
         x-transition
         class="absolute top-full left-0 w-full bg-white shadow-md rounded-b-xl md:hidden flex flex-col items-center gap-4 pb-4 px-8 z-10">
         <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>
        <span class="navbar-text text-center">
            <span class="block">Bienvenido <span class="font-semibold">{{ session('nombre_rol') }}</span></span>
            <span class="block text-[#990000]">{{ session('usuario') }}</span>
        </span>
        <div class="flex w-full">
            <!-- Menú desplegable móvil: Reservas -->
            <details class="w-full text-center">
                <summary class="cursor-pointer text-[#990000] font-semibold py-2">Reservas</summary>
                <div class="flex flex-col items-center pl-4">
                    <a href="{{ url('nuevas-reservas') }}" class="hover:text-[#990000] py-1 list-style-circle">Nuevas Reservas</a>
                    <a href="{{ url('gestion-reservas') }}" class="hover:text-[#990000] py-1 list-style-circle">Gestión reservas</a>
                </div>
            </details>

            <!-- Menú desplegable móvil: Salas -->
            <details class="w-full self-start text-center">
                <summary class="cursor-pointer text-[#990000] font-semibold py-2">Salas</summary>
                <div class="flex flex-col pl-4">
                    <a href="{{ url('busquedas-salas') }}" class="hover:text-[#990000] py-1 list-style-circle">Búsquedas Salas</a>
                    <a href="{{ url('modificar-salas') }}" class="hover:text-[#990000] py-1 pr-3 list-style-circle">Modificar Salas</a>
                </div>
            </details>
        </div>

        <a href="{{ url('proximos-eventos') }}" class="text-[#990000] font-semibold">Próximos eventos</a>
        <a href="{{ url('faq') }}" class="text-[#990000] font-semibold">FAQ</a>
        <a href="{{ route('salir') }}" class="bg-[#990000] text-white px-4 py-2 rounded-lg w-full text-center">Cerrar sesión</a>
    </div>
</div>
