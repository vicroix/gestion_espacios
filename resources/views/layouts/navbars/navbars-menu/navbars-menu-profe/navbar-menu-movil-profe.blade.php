<div x-show="open" x-transition class="absolute top-full left-0 w-full bg-white shadow-md rounded-b-xl md:hidden flex flex-col items-center gap-4 py-4 px-8 z-10">
        <a href="{{ url('/') }}" class="animation-scale"><svg width="20" height="20" class="svg-home-navbar" viewBox="0 0 42 36" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
            </svg>
        </a>
        <span class="navbar-text text-center">
            <span class="block">Bienvenido <span class="font-semibold">{{ session('nombre_rol') }}</span></span>
            <span class="block text-[#990000]">{{ session('usuario') }}</span>
        </span>
        <a href="{{ url('buscar-sala') }}" class="text-[#990000] font-semibold">Gestión reservas</a>
        <a href="{{ url('proximos-eventos') }}" class="text-[#990000] font-semibold">Próximos eventos</a>
        <a href="{{ url('faq') }}" class="text-[#990000] font-semibold">FAQ</a>
        <a href="{{ route('salir') }}" class="bg-[#990000] text-white px-4 py-2 rounded-lg w-full text-center">Cerrar sesión</a>
    </div>
