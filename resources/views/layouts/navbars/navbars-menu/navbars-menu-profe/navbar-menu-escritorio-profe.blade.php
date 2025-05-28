<div class="flex gap-1 justify-center">
    <a href="{{ url('gestion-reservas') }}"
        class="relative px-4 py-1.5 text-sm text-[--color-secundario] transition hover:bg-[--color-eventos] rounded-md duration-300 ease-in-out group
    {{ request()->routeIs('gestion-reservas', 'editar-reserva') ? 'bg-[--color-eventos]' : '' }}">
        Reservas
        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[3px] bg-[--color-primario] rounded-full transition-all duration-300 ease-in-out group-hover:w-3/4"></span>
    </a>
    <span class="text-[--color-primario] font-semibold">|</span>
    <a href="{{ url('gestion-salas') }}"
        class="relative px-4 py-1.5 text-sm text-[--color-secundario] transition hover:bg-[--color-eventos] rounded-md duration-300 ease-in-out group {{ request()->routeIs('gestion-salas', 'detalle-espacio') ? 'bg-[--color-eventos]' : '' }}">
        Gestión Salas
        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[3px] bg-[--color-primario] rounded-full transition-all duration-300 ease-in-out group-hover:w-3/4"></span>
    </a>
    <span class="text-[--color-primario] font-semibold">|</span>
    <a href="{{ url('proximos-eventos') }}"
        class="relative px-4 py-1.5 text-sm text-[--color-secundario] transition hover:bg-[--color-eventos] rounded-md duration-300 ease-in-out group {{ Request::is('proximos-eventos') ? 'bg-[--color-eventos]' : '' }}">
        Próximos eventos
        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[3px] bg-[--color-primario] rounded-full transition-all duration-300 ease-in-out group-hover:w-3/4"></span>
    </a>
    <span class="text-[--color-primario] font-semibold">|</span>
    <a href="{{ url('faq') }}"
        class="relative px-4 py-1.5 text-sm text-[--color-secundario] transition hover:bg-[--color-eventos] rounded-md duration-300 ease-in-out group {{ Request::is('faq') ? 'bg-[--color-eventos]' : '' }}">
        FAQ
        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-[3px] bg-[--color-primario] rounded-full transition-all duration-300 ease-in-out group-hover:w-3/4"></span>
    </a>
    <span class="text-[--color-primario] font-semibold">|</span>
</div>
