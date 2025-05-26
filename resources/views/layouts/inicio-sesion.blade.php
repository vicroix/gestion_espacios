<!-- Modal -->
<div id="loginModal" class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg p-5 shadow-lg w-full max-w-xl relative">
        <div class="flex flex-col gap-4">
            <!-- Título centrado -->
            <div class="flex justify-center">
                <div class="titulo-main w-full flex justify-center">
                    <h3 class="text-2xl border-b">INICIO SESIÓN</h3>
                </div>
                <!-- Botón de cierre (X) -->
                <button id="closeBtn" class="absolute top-4 right-4 text-[#990000] hover:text-gray-800 text-4xl font-bold">&times;</button>
            </div>

            <!-- Contenedor central del formulario e iconos -->
            <div class="flex justify-center mt-4">
                <div class="flex items-start">
                    <!-- Formulario -->
                    <form id="loginForm" action="{{ route('login') }}" method="POST" class="bg-[--color-general] w-80 rounded-lg  flex flex-col items-center gap-4">
                        @csrf
                        <!--Correo electrónico-->
                        <div class="relative w-full">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M4 4h16v16H4z" />
                                <path d="M22 6l-10 7L2 6" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="email"
                                name="email" placeholder="Correo electrónico" required>
                        </div>
                        <!--Contraseña-->
                        <div class="relative w-full">
                            <svg class="absolute left-4 top-2.5 w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2h-1V9a5 5 0 00-10 0v2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                            <input class="border rounded-lg border-gray-300 w-full pl-10 pr-4 py-2" type="password"
                                name="password" placeholder="Contraseña" required>
                        </div>
                        @if(session('error'))
                        <p class="text-red-500">{{ session('error') }}</p>
                        @endif
                    </form>
                </div>
            </div>
            <!-- Botón registro -->
            <p class="text-center">Si no tienes cuenta, <a href="{{ url('form-registro') }}"
                    class="text-[--color-primario]">crea una cuenta
                </a></p>
            <!-- Botón fuera del formulario, centrado globalmente -->
            <div class="w-full flex justify-center">
                <input class="button-primary-auto" type="submit" value="Iniciar sesión" form="loginForm" title="Iniciar sesión">
            </div>
        </div>
    </div>
</div>
