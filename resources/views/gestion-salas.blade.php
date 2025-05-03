@extends("layouts.plantilla")


@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-salas -->

@section("main")
<main>
    <section class="flex mt-5 flex-col lg:w-full">
        <div class="flex justify-center">
            <div class="titulo-main w-full flex justify-center md:mx-[70px]">
                <h3 class="md:text-4xl text-2xl">Gestión de salas</h3>
            </div>
        </div>
        <!--inputs de gestión de salas-->
        <div class="flex justify-center min-w-[300px] w-full mt-5">
            <form id="formGestionSalas" action="{{ route('gestion-espacio') }}" method="POST" class="bg-white lg:w-[300px] m-8 rounded-lg flex-col flex gap-2 justify-center">
                @csrf
                <div class="w-[300px] flex flex-col gap-2">
                    <!--nombre teatro-->
                    <div class="flex items-center">
                        <!-- INPUT NOMBRE TEATRO -->
                        <input class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" name="nombre_teatro" id="nombre_teatro" placeholder="Nombre del teatro">
                    </div>

                    <div class="flex items-center">
                        <!-- INPUT NOMBRE SALA -->
                        <input class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full" type="text" name="nombre_sala" id="nombre_sala" placeholder="Nombre Sala">
                    </div>
                    <div class="flex gap-1">
                        <div class="w-[70%]">
                            <!-- INPUT TELEFONO -->
                            <input class="inputs-text border border-gray-300 focus:outline-none
                            invalid:focus:ring-red-400 peer w-full" type="text" maxlength="9" name="telefono" id="telefono" placeholder="Teléfono">
                        </div>
                        <div class="w-full">
                            <!-- INPUT LOCALIDAD -->
                            <input class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                type="text" name="localidad" id="localidad" placeholder="Localidad">
                        </div>
                    </div>

                    <div class="flex gap-1">
                        <div class="w-[35%]">
                            <!-- INPUT CODIGO POSTAL -->
                            <input class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                type="text" name="codigo_postal" id="codigo_postal" placeholder="C.P." maxlength="5">
                        </div>

                        <div class="w-full">
                            <!-- INPUT DIRECCION -->
                            <input class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                                type="text" name="direccion" id="direccion" placeholder="Dirección">
                        </div>
                    </div>
                    <!--gmail-->
                    <div class="flex items-center">
                        <!-- INPUT EMAIL -->
                        <input class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full" type="email" name="email" id="email" placeholder="Correo electrónico">
                    </div>
                    <!--tel-->


                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <!-- SELECT TIPO (Obra / Ensayo) -->
                            <select class="inputs-text border border-gray-300 text-gray-500 focus:outline-none
                         invalid:focus:ring-red-400 peer w-full" type="text" name="tipo_sala" id="tipo_sala">
                                <option value="" disabled selected hidden>Tipo</option>
                                <option value="Obra" class="text-black">Con público</option>
                                <option value="Ensayo" class="text-black">Ensayo</option>
                            </select>
                        </div>

                        <div class="flex items-center">
                            <!-- INPUT Aforo (10 / 20 / 50 personas) -->
                            <select class="inputs-text border border-gray-300 text-gray-500 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full" type="text" name="aforo" id="aforo">
                                <option value="" disabled selected hidden>Aforo</option>
                                <option value="10" class="text-black">Hasta 10 personas</option>
                                <option value="20" class="text-black">Hasta 20 personas</option>
                                <option value="50" class="text-black">Hasta 50 personas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <!-- TEXTAREA EQUIPAMIENTO -->
                    <textarea class="inputs-text border border-gray-300 min-h-[60px] focus:outline-none
                 invalid:focus:ring-red-400 peer w-full" rows="3" name="equipamiento" id="equipamiento" placeholder="Equipamiento"></textarea>
                </div>
                @if (session('correcto'))
                <p class="text-green-500">{{ session('correcto') }}</p>
                @else
                <p class="text-red-500">{{ session('error') }}</p>
                @endif
                <!--botones-->
                <div class="mt-6 mb-5 flex justify-center gap-4">
                    <button type="submit" class="button-primary-auto lg:w-[108.85px] cursor-pointer">Añadir sala</button>
                    <!-- <button type="submit" class="bg-black w-[60px] lg:w-[150px] py-1.5
                 text-white rounded-md cursor-pointer hover:bg-[#5d5d5d]">Modificar salas</button> -->
                </div>
            </form>
        </div>
    </section>
</main>
 @vite('resources/js/gestion-salas.js')
@endsection
