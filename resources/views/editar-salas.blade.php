@extends('layouts.plantilla')
@vite('resources/css/nuevas-reservas.css')
@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/modificar-salas -->

@section('main')
<main class="ml-25 mr-25">
    <div class="flex justify-center">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="mt-2 md:text-2xl flex gap-2 text-2xl">MODIFICAR ESPACIO</h3>
        </div>
    </div>
    <!--inputs de gestión de salas-->
    <div class="flex justify-center min-w-[340px] w-full mt-2">
        <form id="formGestionSalas" action="{{ route('editar-espacio',['id'=> $espacio->idespacios] )}}" enctype="multipart/form-data" method="POST"
            class="bg-[--color-general] lg:w-[340px] m-3 rounded-lg flex-col flex gap-2 justify-center">
            @csrf
            <div class="w-full flex flex-col gap-2">
                <!--nombre teatro-->
                <div class="flex items-center">
                    <!-- INPUT NOMBRE TEATRO -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->nombre }}" name="nombre_teatro" id="nombre_teatro" placeholder="Nombre del teatro">
                </div>

                <div class="flex items-center">
                    <!-- INPUT NOMBRE SALA -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->nombre_sala }}" name="nombre_sala" id="nombre_sala" placeholder="Nombre Sala">
                </div>
                <div class="flex gap-1">
                    <div class="w-[70%]">
                        <!-- INPUT TELEFONO -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none
                            invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->telefono }}" name="telefono" id="telefono" placeholder="Teléfono">
                    </div>
                    <div class="w-full">
                        <!-- INPUT LOCALIDAD -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->localidad }}" name="localidad" id="localidad" placeholder="Localidad">
                    </div>
                </div>

                <div class="flex gap-1">
                    <div class="w-[35%]">
                        <!-- INPUT CODIGO POSTAL -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->codigopostal }}" name="codigo_postal" id="codigo_postal" placeholder="C.P.">
                    </div>

                    <div class="w-full">
                        <!-- INPUT DIRECCION -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->direccion }}" name="direccion" id="direccion" placeholder="Dirección">
                    </div>
                </div>
                <!--gmail-->
                <div class="flex items-center">
                    <!-- INPUT EMAIL -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                        type="email" value="{{ $espacio->email }}" name="email" id="email" placeholder="Correo electrónico">
                </div>

                <div class="flex justify-between">
                    <div class="flex items-center">
                        <!-- SELECT TIPO (Obra / Ensayo) -->
                        <select
                            class="inputs-text border border-gray-300 focus:outline-none
                         invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->tipo }}" name="tipo_sala" id="tipo_sala">
                            <option value="" class="text-gray-500" disabled selected hidden>Tipo</option>
                            <option value="Obra" class="text-black" @selected($espacio->tipo == "Obra")>Con público</option>
                            <option value="Ensayo" class="text-black" @selected($espacio->tipo == "Ensayo")>Ensayo</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <!-- INPUT Aforo (10 / 20 / 50 personas) -->
                        <select
                            class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                            type="text" name="aforo" id="aforo">
                            <option value="" class="text-gray-500" disabled selected hidden>Aforo</option>
                            <option value="10" class="text-black" @selected($espacio->capacidad == 10)>Hasta 10 personas</option>
                            <option value="20" class="text-black" @selected($espacio->capacidad == 20)>Hasta 20 personas</option>
                            <option value="50" class="text-black" @selected($espacio->capacidad == 50)>Hasta 50 personas</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <!-- TEXTAREA EQUIPAMIENTO -->
                <textarea
                    class="inputs-text border border-gray-300 min-h-[60px] focus:outline-none
                 invalid:focus:ring-red-400 peer w-full"
                    rows="3" name="equipamiento" id="equipamiento" placeholder="Equipamiento">{{ $espacio->equipamiento }}</textarea>
            </div>
            <!-- Listado de fotos actuales -->
            <div class="grid grid-cols-3 gap-2 mb-4">
                @foreach($espacio->fotos as $foto)
                <div class="relative border p-1">
                    <img src="{{ asset('storage/' . $foto->ruta) }}" alt="" class="w-full h-24 object-cover rounded">
                    <label class="absolute top-1 right-1 bg-white rounded-full p-1 shadow">
                        <input type="checkbox" name="fotos_borrar[]" value="{{ $foto->id_fotos }}" class="peer sr-only">
                        {{-- ícono de papelera --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500 peer-checked:text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </label>
                </div>
                @endforeach
            </div>
            <!-- FOTOS -->
            <div>
                <input type="file" name="fotos[]" multiple>
            </div>
            <div class="text-center">
                @if (session('correcto'))
                <p class="text-green-500">{{ session('correcto') }}</p>
                @else
                <p class="text-red-500">{{ session('error') }}</p>
                @endif
            </div>
            <!--botones-->
            <div class="mt-6 mb-5 flex justify-center gap-4">
                <a type="input" href="{{ url('buscar-sala') }}" class="button-secundary-auto text-center lg:w-[70px] cursor-pointer">Volver</a>
                <button type="submit" class="button-primary-auto cursor-pointer">Modificar</button>
            </div>
        </form>
    </div>
    </section>
</main>
@vite('resources/js/nuevas-reservas.js')
@endsection
