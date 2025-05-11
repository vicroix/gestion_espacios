<div class="flex border-2 border-[--color-primario] rounded-3xl h-[40px] items-center">
                <!-- Reservas -->
                <div class="relative group">
                    <button class="px-3 py-1 hover:bg-[--color-primario] border group-hover:bg-[--color-primario] group-hover:text-[--color-general] border-[--color-general] hover:text-[--color-general] rounded-l-3xl transition-all duration-300 ease-out">
                        Reservas
                    </button>
                    <div class="absolute hidden bg-[--color-general] border border-[--color-primario] left-0 w-[154.67px] rounded-3xl group-hover:flex flex-col">
                        <a href="{{ url('buscar-sala') }}" class="hover:bg-[--color-primario] border border-[--color-general] hover:text-[--color-general] rounded-t-3xl p-1 pl-3 transition-all duration-300 ease-out">Nuevas Reservas</a>
                        <a href="{{ url('buscar-reservas') }}" class="hover:bg-[--color-primario] border border-[--color-general] hover:text-[--color-general] rounded-b-3xl p-1 pl-3 transition-all duration-300 ease-out">Gestión reservas</a>
                    </div>
                </div>
                <!-- Salas -->
                <div class="relative group">
                    <button class="px-3 py-1 hover:bg-[--color-primario] border border-[--color-general] group-hover:bg-[--color-primario] group-hover:text-[--color-general] hover:text-[--color-general] transition-all duration-300 ease-out">
                        Salas
                    </button>
                    <div class="absolute hidden bg-[--color-general] border border-[--color-primario] left-0 w-[154.67px] rounded-3xl group-hover:flex flex-col">
                        <a href="{{ url('gestion-salas') }}" class="hover:bg-[--color-primario] border border-[--color-general] hover:text-[--color-general] rounded-t-3xl p-1 pl-3 transition-all duration-300 ease-out">Creación Salas</a>
                        <!-- <a href="{{ url('busquedas-salas') }}" class="hover:bg-[#990000] border border-white hover:text-white rounded-3xl p-2 transition-all duration-300 ease-out">Búsquedas Salas</a> -->
                        <a href="{{ url('modificar-salas') }}" class="hover:bg-[--color-primario] border border-[--color-general] hover:text-[--color-general] rounded-b-3xl p-1 pl-3 transition-all duration-300 ease-out">Modificar Salas</a>
                    </div>
                </div>
                <a href="{{ url('proximos-eventos') }}" class="hover:bg-[--color-primario] px-3 border-2 w-[180px] border-[--color-general] hover:text-[--color-general] p-1 transition-all duration-300 ease-out">Próximos eventos</a>
                <a href="{{ url('faq') }}" class="hover:bg-[--color-primario] border px-3 border-[--color-general] hover:text-[--color-general] rounded-r-3xl p-1 transition-all duration-300 ease-out">FAQ</a>
            </div>
