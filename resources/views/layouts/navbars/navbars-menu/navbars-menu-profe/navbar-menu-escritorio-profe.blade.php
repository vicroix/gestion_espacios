<div class="flex border-2 border-[--color-primario] rounded-3xl relative h-[40px] items-center">
    <div class="relative group" @mouseenter="showDropdown = true" @mouseleave="showDropdown = false">
        <a href="{{ url('gestion-reservas') }}" class="px-3 py-1 hover:bg-[--color-primario] border group-hover:bg-[--color-primario] group-hover:text-[--color-general] border-[--color-general] hover:text-[--color-general] rounded-l-3xl transition-all duration-300 ease-out">
            Reservas
        </a>
    </div>
    <!-- Salas -->
    <div class="relative group">
        <a href="{{ url('gestion-salas') }}" class="px-3 py-1 hover:bg-[--color-primario] border border-[--color-general] group-hover:bg-[--color-primario] group-hover:text-[--color-general] hover:text-[--color-general] transition-all duration-300 ease-out">
            Gestión Salas
        </a>
    </div>
    <a href="{{ url('proximos-eventos') }}"
        class="hover:bg-[--color-primario] px-3 border border-[--color-general] hover:text-[--color-general] p-1 transition-all duration-300 ease-out">
        Próximos eventos
    </a>
    <a href="{{ url('faq') }}"
        class="hover:bg-[--color-primario] px-3 border border-[--color-general] hover:text-[--color-general] rounded-r-3xl p-1 transition-all duration-300 ease-out">
        FAQ
    </a>
</div>
