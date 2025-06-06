<section class="flex flex-col lg:w-full">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="md:text-2xl text-2xl">CREACIÓN DE SALAS</h3>
        </div>
    </div>
    <div class="text-center">
        @if (session('correcto'))
        <div class="flex justify-center gap-2">
            <p class="text-[--color-primario]">{{ session('correcto') }}</p>
            <p class="text-green-600">creado correctamente</p>
        </div>
        @else
        <p class="text-red-500">{{ session('error') }}</p>
        @endif
    </div>
    <!--Inputs de Crear de salas-->
    <div class="flex justify-center w-full mt-2">
        <form id="formGestionSalas" x-init="$nextTick(() => cargaFormularioCreacionSalas())" action="{{ route('gestion-espacio') }}" enctype="multipart/form-data" method="POST"
            class="bg-[--color-general] lg:w-[500px] m-1 rounded-lg flex-col flex gap-2 justify-center">
            @csrf
            <div class="w-full flex flex-col gap-2">
                <!--Información básica-->
                <div class="mb-1 bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h2 class="text-lg mb-4">Información básica</h2>
                    <!--nombre teatro-->
                    <div class="flex items-center">
                        <!-- INPUT NOMBRE TEATRO -->
                        <input
                            class="inputs-text mb-4 border border-gray-300 invalid:focus:ring-red-400 peer w-full"
                            type="text" name="nombre_teatro" id="nombre_teatro" placeholder="Nombre del teatro">
                    </div>
                    <div class="flex items-center">
                        <!-- INPUT NOMBRE SALA -->
                        <input
                            class="inputs-text mb-4 border border-gray-300
                     invalid:focus:ring-red-400 peer w-full"
                            type="text" name="nombre_sala" id="nombre_sala" placeholder="Nombre Sala">
                    </div>
                    <div class="flex gap-1">
                        <!-- INPUT LOCALIDAD -->
                        <div class="w-full mb-4">
                            <input
                                class="inputs-text border border-gray-300 invalid:focus:ring-red-400 peer w-full"
                                type="text" name="localidad" id="localidad" placeholder="Localidad">
                        </div>
                        <!-- INPUT CODIGO POSTAL -->
                        <div class="w-[50%]">
                            <input
                                class="inputs-text border border-gray-300 invalid:focus:ring-red-400 peer w-full"
                                type="text" name="codigo_postal" id="codigo_postal" placeholder="C.P.">
                        </div>
                    </div>
                    <div class="flex gap-1">
                        <div class="w-full">
                            <!-- INPUT DIRECCION -->
                            <input
                                class="inputs-text border border-gray-300 invalid:focus:ring-red-400 peer w-full"
                                type="text" name="direccion" id="direccion" placeholder="Dirección">
                        </div>
                    </div>
                </div>
                <!--Datos de contacto-->
                <div class="mb-1 bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h2 class="text-lg mb-4">Datos de contacto</h2>
                    <!--gmail-->
                    <div class="flex items-center mb-4">
                        <!-- INPUT EMAIL -->
                        <input
                            class="inputs-text border border-gray-300
                     invalid:focus:ring-red-400 peer w-full"
                            type="email" name="email" id="email" placeholder="Correo electrónico">
                    </div>
                    <!-- INPUT TELEFONO -->
                    <input
                        class="inputs-text border border-gray-300
                            invalid:focus:ring-red-400 peer w-full"
                        type="text" name="telefono" id="telefono" placeholder="Teléfono">
                </div>
                <div class="w-full">
                </div>
                <!--Características del espacio-->
                <div class="flex flex-col gap-3 mb-1 bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h2 class="text-lg mb-4">Características del espacio</h2>
                    <div class="flex mb-4 gap-3 justify-center">
                        <div class="flex items-center align-middle">
                            <!-- SELECT TIPO (Obra / Ensayo) -->
                            <select
                                class="inputs-text border border-gray-300
                                invalid:text-gray-400 invalid:focus:ring-red-400 peer w-full"
                                type="text" name="tipo_sala" id="tipo_sala" required>
                                <option value="" disabled selected hidden>Tipo</option>
                                <option value="Obra" class="text-black">Con público</option>
                                <option value="Ensayo" class="text-black">Ensayo</option>
                            </select>
                        </div>
                        <div class="flex items-center">
                            <!-- INPUT Aforo (10 / 20 / 50 personas) -->
                            <select
                                class="inputs-text border border-gray-300
                                invalid:text-gray-400 invalid:focus:ring-red-400 peer w-full"
                                type="text" name="aforo" id="aforo" required>
                                <option value="" disabled selected hidden>Aforo</option>
                                <option value="10" class="text-black">Hasta 10 personas</option>
                                <option value="20" class="text-black">Hasta 20 personas</option>
                                <option value="30" class="text-black">Hasta 30 personas</option>
                                <option value="50" class="text-black">Hasta 50 personas</option>
                                <option value="75" class="text-black">Hasta 75 personas</option>
                                <option value="100" class="text-black">Hasta 100 personas</option>
                                <option value="150" class="text-black">Hasta 150 personas</option>
                                <option value="200" class="text-black">Hasta 200 personas</option>
                            </select>
                        </div>
                    </div>
                    <!-- Input acceso  -->
                    <div class="w-[60%]">
                        <select name="movilidad_reducida" id="movilidad_reducida"
                            class="inputs-text border border-gray-300 invalid:text-gray-400 invalid:focus:ring-red-400 peer w-full" required>
                            <option value="" disabled selected hidden>Movilidad reducida</option>
                            <option value="Si" class="text-black">Mov. reducida - Sí</option>
                            <option value="No" class="text-black">Mov. reducida - No</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <!-- TEXTAREA EQUIPAMIENTO -->
                        <textarea
                            class="inputs-text mb-4 border border-gray-300 min-h-[60px]
                 invalid:focus:ring-red-400 peer w-full"
                            rows="3" name="equipamiento" id="equipamiento" placeholder="Equipamiento"></textarea>
                    </div>
                    <!-- FOTOS -->
                    <div class="flex gap-3 items-center">
                        <p>Fotos: </p>
                        <input type="file" name="fotos[]" title="Añadir fotos" multiple>
                    </div>
                </div>
            </div>
            <!--botones-->
            <div class="mt-6 mb-5 flex justify-center gap-4">
                <a @click="mostrarFiltroEspacios = !mostrarFiltroEspacios" class="inline-flex w-[61.97] h-[43.99] justify-center items-center button-reserva-a-filtro">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                        <path fill="currentColor"
                            d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                    </svg>
                </a>
                <button type="submit"
                    class="button-primary-auto lg:w-[108.85px] cursor-pointer w-[61.97] h-[43.99] flex justify-center items-center" title="Confirmar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 376 384">
                        <path fill="currentColor" d="M119 282L346 55l29 30l-256 256L0 222l30-30z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</section>
