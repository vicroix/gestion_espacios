<div x-show="abrir"
    x-transition
    class="absolute top-full left-0 w-full bg-[--color-general] shadow-md rounded-b-xl md:hidden flex flex-col items-center gap-4 pb-4 px-8 z-10">
    <a href="{{ url('/') }}" class="animation-scale"><svg width="20" height="20" class="svg-home-navbar" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.6667 35.4167V22.9167H25V35.4167H35.4167V18.75H41.6667L20.8333 0L0 18.75H6.25V35.4167H16.6667Z" fill="#990000" />
        </svg>
    </a>
    <span class="navbar-text text-center">
        <span class="block">Bienvenido <span class="font-semibold">{{ session('nombre_rol') }}</span></span>
        <span class="block text-[--color-primario]">{{ session('usuario') }}</span>
    </span>
    <div class="flex gap-3">
        <a href="{{ url('gestion-reservas') }}" class="text-[--color-primario] font-semibold">Reservas</a><p>|</p>
        <a href="{{ url('gestion-salas') }}" class="text-[--color-primario] font-semibold">Gestión Salas</a><p>|</p>
        <a href="{{ url('proximos-eventos') }}" class="text-[--color-primario] font-semibold">Próximos eventos</a><p>|</p>
        <a href="{{ url('faq') }}" class="text-[--color-primario] font-semibold">FAQ</a>
    </div>
    <a href="{{ route('salir') }}" class="button-primary-auto w-full text-center">Cerrar sesión</a>
</div>
