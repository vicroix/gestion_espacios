<div class="flex border-2 border-[#990000] rounded-3xl">
                <!-- Reservas -->
                <div class="relative group">
                    <button class="px-3 py-1 hover:bg-[#990000] border group-hover:bg-[#990000] group-hover:text-white border-white hover:text-white rounded-l-3xl transition-all duration-300 ease-out">
                        Reservas
                    </button>
                    <div class="absolute hidden bg-white border border-[#990000] left-0 w-[154.67px] rounded-3xl group-hover:flex flex-col">
                        <a href="{{ url('buscar-sala') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-t-3xl p-1 transition-all duration-300 ease-out">Nuevas Reservas</a>
                        <a href="{{ url('buscar-reservas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-b-3xl p-1 transition-all duration-300 ease-out">Gestión reservas</a>
                    </div>
                </div>
                <!-- Salas -->
                <div class="relative group">
                    <button class="px-3 py-1 hover:bg-[#990000] border border-white group-hover:bg-[#990000] group-hover:text-white hover:text-white transition-all duration-300 ease-out">
                        Salas
                    </button>
                    <div class="absolute hidden bg-white border border-[#990000] left-0 w-[154.67px] rounded-3xl group-hover:flex flex-col">
                        <a href="{{ url('gestion-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-t-3xl p-1 transition-all duration-300 ease-out">Creación Salas</a>
                        <!-- <a href="{{ url('busquedas-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-3xl p-2 transition-all duration-300 ease-out">Búsquedas Salas</a> -->
                        <a href="{{ url('modificar-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-b-3xl p-1 transition-all duration-300 ease-out">Modificar Salas</a>
                    </div>
                </div>
                <a href="{{ url('proximos-eventos') }}" class="hover:bg-[#990000] px-3 border border-white hover:text-white p-1 transition-all duration-300 ease-out">Próximos eventos</a>
                <a href="{{ url('faq') }}" class="hover:bg-[#990000] border px-3 border-white hover:text-white rounded-r-3xl p-1 transition-all duration-300 ease-out">FAQ</a>
            </div>
