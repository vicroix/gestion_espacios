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
        <button @click="open = !open" class="text-[#990000] focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
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
        <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>
        <!-- Proximos eventos y FAQ -->
        <div class="flex gap-1 border-2 border-[#990000] rounded-xl">
            <a href="{{ url('proximos-eventos') }}"
                class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">
                Próximos eventos
            </a>
            <a href="{{ url('faq') }}"
                class="hover:bg-[#990000] border border-white hover:text-white rounded-xl p-2 transition-all duration-300 ease-out">
                FAQ
            </a>
        </div>
        <!-- Registro e inicio sesión -->
        <div class="flex gap-3">
            <a href="{{ url('form-registro') }}"
                class="bg-black hover:bg-[#5d5d5d] text-white px-2 py-2 rounded-lg">Registro</a>
            <a href="{{ url('inicio-sesion') }}"
                class="bg-[#990000] hover:bg-[#a84848] text-white px-2 py-2 rounded-lg">Iniciar sesión</a>
        </div>
    </div>

    <!-- Menú desplegable para móviles -->
    <div x-show="open"
        x-transition
        class="absolute top-full left-0 w-full bg-white shadow-md rounded-b-xl md:hidden flex flex-col items-center gap-4 pb-3 px-8 z-10">
        <a href="{{ url('/') }}" class="animation-scale">{!! $homeSvg !!}</a>
        <a href="{{ url('proximos-eventos') }}" class="text-[#990000] font-semibold">Próximos eventos</a>
        <a href="{{ url('faq') }}" class="text-[#990000] font-semibold">FAQ</a>
        <a href="{{ url('form-registro') }}" class="bg-black text-white px-3 py-2 rounded-lg w-full text-center">Registro</a>
        <a href="{{ url('inicio-sesion') }}" class="bg-[#990000] text-white px-3 py-2 rounded-lg w-full text-center">Iniciar sesión</a>
    </div>
</div>
