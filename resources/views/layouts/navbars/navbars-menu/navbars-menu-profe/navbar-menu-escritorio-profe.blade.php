<div class="flex border-2 border-[#990000] rounded-3xl relative">
                <div class="relative group" @mouseenter="showDropdown = true" @mouseleave="showDropdown = false">
                    <button class="px-4 py-1 hover:bg-[#990000] border border-white group-hover:bg-[#990000] group-hover:text-white rounded-l-3xl transition-all duration-300 ease-out">
                        Reservas
                    </button>
                    <div class="absolute hidden bg-white border border-[#990000] left-0 w-[154.67px] rounded-3xl group-hover:flex flex-col">
                        <a href="{{ url('buscar-sala') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-t-3xl p-1 transition-all duration-300 ease-out">Nuevas Reservas</a>
                        <a href="{{ url('buscar-reservas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-b-3xl p-1 transition-all duration-300 ease-out">Gestión reservas</a>
                    </div>
                </div>

                <a href="{{ url('proximos-eventos') }}" class="hover:bg-[#990000] border border-white hover:text-white p-1 transition-all duration-300 ease-out">
                    Próximos eventos
                </a>
                <a href="{{ url('faq') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-r-3xl p-1 transition-all duration-300 ease-out">
                    FAQ
                </a>
            </div>
