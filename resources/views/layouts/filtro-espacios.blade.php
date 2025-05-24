<div class="relative lg:max-h-screen flex flex-col">
    <div class="text-center">
        <div class="flex justify-center mb-5">
            <div class="titulo-main w-full flex justify-center md:mx-[70px]">
                <h3 class="md:text-2xl text-2xl">GESTIÓN SALAS</h3>
            </div>
        </div>
        <div class="flex gap-2 justify-center mb-4">
            @if (session('eliminado'))
            <p class="text-[--color-primario] font-semibold">{{ session('eliminado') }}</p>
            <p class="text-red-950 font-semibold">eliminado correctamente</p>
            @endif
        </div>
    </div>
    <div x-data="{ openCiudades: false, openTipo: false, openFiltros: false, openAforo: false }" class="flex flex-col items-center min-w-[320px] gap-4 lg:items-start lg:flex-row">
        <div class="flex flex-col gap-2">
            <!-- Sidebar de filtros -->
            <aside class="w-64 px-2 shadow-md p-2">
                <h2 id="h2" @click="openFiltros = !openFiltros" class="mt-0">
                    <!--Icono de filtros-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M9 5a1 1 0 1 0 0 2a1 1 0 0 0 0-2M6.17 5a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 0 1 0-2zM15 11a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-1.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2zM9 17a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.83 0a3.001 3.001 0 0 1 5.66 0H19a1 1 0 1 1 0 2h-7.17a3.001 3.001 0 0 1-5.66 0H5a1 1 0 1 1 0-2z" />
                    </svg>
                    Filtros
                </h2>
                <form method="GET" id="formFiltroEspacios" action="{{ route('gestion-salas') }}" class="flex flex-col gap-2 space-y-0 mb-2 px-1">
                    <div class="relative">
                        <!-- Botón para resetear filtro -->
                        <button type="reset" class="absolute right-0 -translate-y-[45px] w-[30px]" title="Limpiar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16" class="mb-4 p-1 w-full items-center hover:shadow-around border-2 hover:shadow-gray-300 hover:bg-gray-200 rounded-md">
                                <g fill="none">
                                    <g clip-path="url(#IconifyId196d9d8a7b2e9fd2d1)">
                                        <path fill="currentColor" fill-rule="evenodd" d="M11.995.667a.75.75 0 1 0-1.49.166L11.19 7h-.867c-1.64 0-2.896 1.449-3.197 3.06a12.6 12.6 0 0 1-1.2 3.44C5.434 14.448 5 15 5 15h8.5s2.08-1.734 2.488-5.49C16.14 8.094 14.91 7 13.488 7H12.7zM3.75 2.5a.75.75 0 1 0 0 1.5h4.5a.75.75 0 0 0 0-1.5zM.75 6a.75.75 0 1 0 0 1.5h5.5a.75.75 0 0 0 0-1.5zM1 10.25a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75m6.593 3.25c.393-.866.78-1.94 1.008-3.165C8.819 9.167 9.646 8.5 10.322 8.5h3.167c.332 0 .618.13.797.303a.63.63 0 0 1 .21.545c-.175 1.622-.708 2.779-1.173 3.514a6 6 0 0 1-.461.638h-.999c.539-.706.887-1.728.887-2.75H12c-.351 1.229-1.072 2.088-2.162 2.75z" clip-rule="evenodd" />
                                    </g>
                                    <defs>
                                        <clipPath id="IconifyId196d9d8a7b2e9fd2d1">
                                            <path fill="currentColor" d="M0 0h16v16H0z" />
                                        </clipPath>
                                    </defs>
                                </g>
                            </svg>
                        </button>
                        <!-- Ciudades -->
                        <div>
                            <h3 id="h3" class="flex justify-between gap-1 items-center border rounded-md p-1" @click="openCiudades = !openCiudades">
                                Ciudades
                                <span x-show="!openCiudades" class="text-[--color-primario]"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                    </svg></span>
                                <span x-show="openCiudades"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                        height="15" viewBox="0 0 32 32">
                                        <path fill="currentColor"
                                            d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                    </svg></span>
                            </h3>
                            <div x-show="openCiudades" x-transition>
                                <div class="mb-2">
                                    <input type="text" name="localidad" value="{{ request()->input('localidad') }}"
                                        class="inputs-filtros w-full mr-2" placeholder="Localidad">
                                </div>
                                @foreach (['Madrid', 'Barcelona', 'Sevilla', 'Málaga', 'Granada', 'Huelva', 'Valencia', 'Cádiz', 'Tarragona', 'Cádiz', 'Salamanca', 'León'] as $ciudad)
                                <label class="block text-gray-600">
                                    <input type="checkbox" name="ciudades[]" value="{{ $ciudad }}" class="mr-2">
                                    {{ $ciudad }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Tipo de sala -->
                    <div>
                        <h3 id="h3" class="flex justify-between gap-1 items-center border rounded-md p-1" @click="openTipo = !openTipo">
                            Tipo de sala
                            <span x-show="!openTipo" class="text-[--color-primario]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                </svg></span>
                            <span x-show="openTipo"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                    height="15" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                </svg></span>
                        </h3>
                        <div x-show="openTipo" x-transition>
                            @foreach (['Obra', 'Ensayo'] as $tipo)
                            <label class="block text-gray-600">
                                <input type="radio" name="tipo" value="{{ strtolower($tipo) }}" class="mr-2">
                                {{ $tipo }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <!-- Capacidad (AFORO) -->
                    <div>
                        <h3 id="h3" class="flex justify-between gap-1 items-center border rounded-md p-1" @click="openAforo = !openAforo">
                            Aforo
                            <span x-show="!openAforo" class="text-[--color-primario]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                </svg></span>
                            <span x-show="openAforo"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                    height="15" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                </svg></span>
                        </h3>
                        @foreach (['10' => 'Hasta 10 personas', '20' => 'Hasta 20 personas', '30' => 'Hasta 30 personas'] as $valor => $label)
                        <label class="block text-gray-600" x-show="openAforo">
                            <input type="radio" name="capacidad" value="{{ $valor }}" class="mr-2">
                            {{ $label }}
                        </label>
                        @endforeach
                    </div>
                    <!-- + Filtros -->
                    <div>
                        <h3 id="h3" class="flex justify-between gap-1 items-center border rounded-md p-1" @click="openFiltros = !openFiltros">
                            Filtros
                            <span x-show="!openFiltros" class="text-[--color-primario]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 10h-4V6a2 2 0 0 0-4 0l.071 4H6a2 2 0 0 0 0 4l4.071-.071L10 18a2 2 0 0 0 4 0v-4.071L18 14a2 2 0 0 0 0-4" />
                                </svg></span>
                            <span x-show="openFiltros"><svg xmlns="http://www.w3.org/2000/svg" width="15"
                                    height="15" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                        d="M2 15.99c0-1.69 1.38-3.06 3.06-3.06h21.85c1.69 0 3.06 1.38 3.06 3.06c0 1.69-1.38 3.06-3.06 3.06H5.06C3.38 19.05 2 17.67 2 15.99" />
                                </svg></span>
                        </h3>
                        <div x-show="openFiltros" x-transition class="pl flex flex-col gap-1">
                            <!-- Equipamiento -->
                            <div>
                                <!-- <h3 id="h3">Equipamiento</h3> -->
                                <input type="text" name="equipamiento"
                                    value="{{ request()->input('equipamiento') }}"
                                    class="inputs-filtros w-full border rounded mr-2" placeholder="Equipamiento">
                            </div>

                            <!-- Nombre del teatro -->
                            <div>
                                <!-- <h3 id="h3">Nombre del teatro</h3> -->
                                <input type="text" name="nombre" value="{{ request()->input('nombre') }}"
                                    class="inputs-filtros w-full border rounded" placeholder="Nombre del teatro">
                            </div>

                            <!-- Dirección -->
                            <div>
                                <!-- <h3 id="h3">Dirección</h3> -->
                                <input type="text" name="direccion" value="{{ request()->input('direccion') }}"
                                    class="inputs-filtros w-full border rounded" placeholder="Dirección">
                            </div>

                            <!-- Nombre de sala -->
                            <div>
                                <!-- <h3 id="h3">Nombre de sala</h3> -->
                                <input type="text" name="nombre_sala"
                                    value="{{ request()->input('nombre_sala') }}" class="inputs-filtros w-full border rounded"
                                    placeholder="Nombre de sala">
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <!-- Botón de búsqueda -->
                        <button type="submit" class="button-primary-auto mt-2 w-[61.97] mb-2" title="Buscar">
                            <div class="flex justify-center">
                                <svg width="50" height="18" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M35 35L27.75 27.75M31.6667 18.3333C31.6667 25.6971 25.6971 31.6667 18.3333 31.6667C10.9695 31.6667 5 25.6971 5 18.3333C5 10.9695 10.9695 5 18.3333 5C25.6971 5 31.6667 10.9695 31.6667 18.3333Z"
                                        stroke=var(--color-general) stroke-width="2.56" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </aside>
            @if (session('id_rol') === 1)
            <!-- Sidebar de añadir salas -->
            <aside class="w-64 px-2 shadow-md">
                <button @click="mostrarFiltroEspacios = !mostrarFiltroEspacios" class="w-full">
                    <h2 id="h2" class="mt-2 mb-2">
                        <!--Icono de añadir-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                            viewBox="0 0 24 24">
                            <path fill="#000000"
                                d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m-5-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                        </svg>
                        Añadir sala
                    </h2>
                </button>
            </aside>
            @endif
        </div>
        <!-- Resultados -->
        @if(isset($espacios) && $espacios->isNotEmpty())
        <section
            class="grid w-[80%] xl:gap-12 place-items-center grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-4 4xl:grid-cols-5">
            @foreach ($espacios as $espacio)
            <div class="relative hover:bg-slate-100/85 h-[165px] w-[300px] cursor-default shadow rounded-xl transition duration-250 ease-in-out hover:shadow-lg"
                tabindex="0">
                <div class="rounded-xl p-3 border-t-4 border-[--color-primario]">
                    <div>
                        <div class="flex justify-between gap-4 items-center">
                            <h4
                                class="text-lg font-semibold text-[--color-primario] items-center justify-between truncate">
                                {{ $espacio->nombre }}
                            </h4>
                            @if ($espacio->movilidad_reducida === 'Si')
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512" class="rounded-md">
                                <path fill="#00B1FF" d="M508.333 32.666C508.333 16.35 494.984 3 478.668 3H29.032C14.348 3 2.333 15.015 2.333 29.699v452.602C2.333 496.985 14.348 509 29.032 509h449.635c16.316 0 29.666-13.35 29.666-29.666z" />
                                <path fill="#0096D1" d="M478.668 488.915H29.032c-14.684 0-26.699-12.015-26.699-26.699v20.085C2.333 496.985 14.348 509 29.032 509h449.635c16.316 0 29.666-13.35 29.666-29.666v-20.085c0 16.316-13.349 29.666-29.665 29.666" />
                                <circle cx="221.736" cy="92.69" r="40.87" fill="#FFF" />
                                <path fill="#FFF" d="M194.156 449.052c-11.593 0-23.184-1.522-34.315-4.548c-17.688-4.809-34.539-13.548-48.729-25.274c-14.164-11.705-25.927-26.579-34.018-43.015c-8.333-16.925-12.939-35.892-13.321-54.851c-.384-19.083 3.483-38.317 11.185-55.625c7.424-16.684 18.564-31.962 32.217-44.186a131 131 0 0 1 17.229-13.026c9.941-6.298 23.106-3.344 29.405 6.598s3.344 23.107-6.598 29.405a88 88 0 0 0-11.606 8.773c-9.207 8.243-16.713 18.534-21.71 29.763c-5.173 11.626-7.771 24.573-7.512 37.44c.257 12.763 3.351 25.518 8.947 36.884c5.45 11.069 13.379 21.092 22.931 28.985c9.551 7.893 20.879 13.771 32.76 17.001c12.542 3.41 25.964 3.983 38.814 1.662c12.209-2.207 24.068-7.131 34.292-14.24c10.147-7.056 18.874-16.376 25.236-26.954a87 87 0 0 0 4.726-9.016c4.843-10.726 17.463-15.497 28.191-10.65c10.726 4.843 15.494 17.465 10.65 28.191a130 130 0 0 1-7.047 13.444c-9.437 15.689-22.379 29.514-37.426 39.977c-15.209 10.575-32.86 17.901-51.044 21.188a131 131 0 0 1-23.257 2.074" />
                                <path fill="#FFF" d="M446.968 319.8c-8.322-8.321-21.814-8.323-30.137 0l-4.128 4.128l-45.308-45.307a21.3 21.3 0 0 0-15.068-6.241H265.78v-44.029h63.098c11.769 0 21.31-9.541 21.31-21.31s-9.541-21.31-21.31-21.31H265.78v-6.467c0-16.621-13.474-30.095-30.095-30.095h-27.897c-16.621 0-30.095 13.474-30.095 30.095v105.429c0 16.621 13.474 30.095 30.095 30.095h4.233c.93.124 1.872.21 2.837.21h128.644l54.134 54.134c4.161 4.161 9.615 6.241 15.068 6.241s10.907-2.08 15.068-6.241l19.196-19.196c8.322-8.322 8.322-21.814 0-30.136" />
                            </svg>
                            @endif
                            <div class="group w-[40px] flex justify-center items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    class="text-gray-800 w-full group-hover:hidden rounded-xl shadow-around shadow-gray-400"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM19 11h-2V9h-2V7h2V5h2v2h2v2h-2v2Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    class="text-gray-500 w-full hidden group-hover:block rounded-xl shadow-around shadow-[--color-primario]"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m16.577 20l-5.767-5.766a5.035 5.035 0 0 1-6.336-7.76a5.035 5.035 0 0 1 7.761 6.335L18 18.576L16.577 20ZM8.034 7.014a3.02 3.02 0 1 0-.004 6.04a3.02 3.02 0 0 0 .004-6.04ZM21 9h-6V7h6v2Z" />
                                </svg>
                                <!-- Detalle aparece abajo, ligeramente a la derecha -->
                                <div
                                    class="contenedor-mas-detalles absolute p-3 rounded-xl shadow-lg left-1/2 -translate-x-1/2 top-[100%] w-[300px] pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300">
                                    <p><strong>Nombre:</strong> {{ $espacio->nombre }}</p>
                                    <p><strong>Sala:</strong> {{ $espacio->nombre_sala }}</p>
                                    <p><strong>Direccion:</strong> {{ $espacio->direccion }}</p>
                                    <p><strong>Tel:</strong> {{ $espacio->telefono }}</p>
                                    <p><strong>Tipo:</strong> {{ $espacio->tipo }}</p>
                                    <p><strong>Capacidad:</strong> {{ $espacio->capacidad }}</p>
                                    <p><strong>Equipamiento:</strong> {{ $espacio->equipamiento }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-700">Localidad: {{ $espacio->localidad }}</p>
                        <p class="text-gray-700 truncate">Dirección: {{ $espacio->direccion }}</p>
                    </div>
                    <div class="mt-3 flex gap-3 justify-end items-center">
                        <!-- Botón ir a Reservar (Calendario) -->
                        <a href="{{ route('detalle-espacio', ['id' => $espacio->idespacios]) }}"
                            class="inline-flex w-[55.95] h-[40] justify-center items-center button-filtro-a-reserva" title="Reservar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 2048 2048">
                                <path fill="currentColor"
                                    d="M1792 993q60 41 107 93t81 114t50 131t18 141q0 119-45 224t-124 183t-183 123t-224 46q-91 0-176-27t-156-78t-126-122t-85-157H128V128h256V0h128v128h896V0h128v128h256zM256 256v256h1408V256h-128v128h-128V256H512v128H384V256zm643 1280q-3-31-3-64q0-86 24-167t73-153h-97v-128h128v86q41-51 91-90t108-67t121-42t128-15q100 0 192 33V640H256v896zm573 384q93 0 174-35t142-96t96-142t36-175q0-93-35-174t-96-142t-142-96t-175-36q-93 0-174 35t-142 96t-96 142t-36 175q0 93 35 174t96 142t142 96t175 36m64-512h192v128h-320v-384h128zM384 1024h128v128H384zm256 0h128v128H640zm0-256h128v128H640zm-256 512h128v128H384zm256 0h128v128H640zm384-384H896V768h128zm256 0h-128V768h128zm256 0h-128V768h128z" />
                            </svg>
                        </a>
                        <!-- Botón Editar (Lápiz)-->
                        @if (session('id_rol') === 1)
                        <a href="{{ route('editar-salas', ['id' => $espacio->idespacios]) }}"
                            class="inline-flex w-[55.95] h-[40] justify-center items-center button-filtro-a-editar-sala" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2">
                                    <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                </g>
                            </svg>
                        </a>
                        @endif
                        <!-- Botón con Eliminar -->
                        @if (session('id_rol') === 1)
                        <form method="POST" action="{{ route('eliminar-espacio', ['id'=> $espacio->idespacios]) }}" class="mb-0" onsubmit="return confirm('Seguro qué deseas eliminar el espacio {{ $espacio->nombre }}')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="button-secundary-auto w-[55.95] h-[40] flex justify-center items-center" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        @else
        <div class="col-span-full flex flex-col gap-2 justify-center lg:absolute lg:left-1/2 lg:-translate-x-1/2">
            @if (session('id_rol') === 1)
            <p class="text-center">No se encontraron espacios.
            </p>
            <p>Ingrese en <strong>Añadir Sala</strong> o pulse a continuación en</p>
            <a @click="mostrarFiltroEspacios = !mostrarFiltroEspacios" class="hover:text-[--color-primario] gap-2 font-semibold justify-center items-center cursor-pointer flex">creación de espacios
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M32 32v224h448V32zm50.68 289.7c-14.05 0-24.17 1-30.73 3c-6.57 2-9.44 4.3-11.93 8.6c-1.46 2.5-2.56 6.2-3.41 10.9c4.88.7 9.36 1.5 13.48 2.8c10 3 18.17 9 23.1 17.3C78.12 356 86.27 350 96.27 347c8.93-2.7 19.43-3.8 32.43-4c-.8-4.2-1.8-7.4-3.2-9.7c-2.5-4.3-5.4-6.6-12-8.6s-16.74-3-30.82-3m115.52 0c-14.1 0-24.2 1-30.7 3c-6.6 2-9.5 4.3-12 8.6c-1.4 2.4-2.5 5.8-3.3 10.3c7.5.6 14 1.6 19.8 3.4c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c7.4-2.3 15.9-3.4 26-3.8c-.8-4.2-1.8-7.5-3.2-9.9c-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3m115.5 0c-14.1 0-24.2 1-30.7 3c-6.6 2-9.5 4.3-12 8.6c-1.4 2.4-2.4 5.7-3.2 9.9c10.1.4 18.7 1.5 26.1 3.8c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c5.8-1.8 12.3-2.8 19.7-3.4c-.8-4.5-1.9-7.9-3.3-10.3c-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3m115.5 0c-14.1 0-24.2 1-30.7 3c-6.6 2-9.5 4.3-12 8.6c-1.4 2.3-2.4 5.5-3.2 9.7c13.1.2 23.6 1.3 32.5 4c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c4.1-1.3 8.6-2.1 13.4-2.8c-.8-4.7-1.9-8.4-3.4-10.9c-2.5-4.3-5.4-6.6-12-8.6s-16.7-3-30.8-3M134.1 361c-14.9 0-25.6 1-32.6 3.2c-6.99 2.1-10.17 4.6-12.88 9.4c-2.53 4.4-4.06 11.8-5 22.3c10.74.4 19.68 1.4 27.38 3.8c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c7.7-2.4 16.7-3.5 27.5-3.8c-1-10.5-2.5-17.9-5-22.3c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2m121.9 0c-14.9 0-25.6 1-32.6 3.2c-7 2.1-10.2 4.6-12.9 9.4c-2.5 4.4-4 11.8-5 22.3c10.8.4 19.7 1.4 27.4 3.8c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c7.7-2.4 16.7-3.5 27.5-3.8c-1-10.5-2.5-17.9-5-22.3c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2m121.9 0c-14.9 0-25.6 1-32.6 3.2c-7 2.1-10.2 4.6-12.9 9.4c-2.5 4.4-4 11.8-5 22.3c10.8.4 19.7 1.4 27.4 3.8c10 3 18.2 8.9 23.1 17.3c4.9-8.4 13-14.3 23.1-17.3c7.7-2.4 16.7-3.5 27.5-3.8c-1-10.5-2.5-17.9-5-22.3c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2m-359.9.1v48.5c4.64-4.5 10.54-7.9 17.28-9.9c7.76-2.4 16.72-3.5 27.49-3.8c-.93-10.5-2.48-17.9-5-22.3c-2.71-4.7-5.9-7.3-12.93-9.4c-6.07-1.9-14.94-2.9-26.84-3.1m476 0c-11.9.2-20.8 1.2-26.8 3.1c-7 2.1-10.2 4.6-12.9 9.4c-2.5 4.4-4 11.8-5 22.3c10.8.4 19.7 1.4 27.4 3.8c6.7 2 12.6 5.4 17.3 9.9zM73.1 413.7c-14.84 0-25.56 1-32.56 3.2c-7.01 2.1-10.18 4.6-12.89 9.4c-4.93 8.6-6.15 28.5-6.33 60.7H125c-.2-32.2-1.4-52.1-6.3-60.7c-2.7-4.7-5.9-7.3-13-9.4c-6.98-2.2-17.72-3.2-32.6-3.2m121.9 0c-14.9 0-25.6 1-32.6 3.2c-7 2.1-10.2 4.6-12.9 9.4c-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2m121.9 0c-14.9 0-25.6 1-32.6 3.2c-7 2.1-10.2 4.6-12.9 9.4c-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2m121.9 0c-14.8 0-25.6 1-32.6 3.2c-7 2.1-10.2 4.6-12.9 9.4c-4.9 8.6-6.1 28.5-6.3 60.7h103.7c-.2-32.2-1.4-52.1-6.3-60.7c-2.7-4.7-5.9-7.3-13-9.4c-7-2.2-17.7-3.2-32.6-3.2" />
                </svg>
            </a>
            @else
            <p class="text-center">No se encontraron espacios disponibles
            </p>
            @endif
        </div>
        @endif
    </div>
</div>
