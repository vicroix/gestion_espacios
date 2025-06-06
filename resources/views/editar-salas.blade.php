@extends('layouts.plantilla')
@vite('resources/css/nuevas-reservas.css')
@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/modificar-salas -->

<title>Edición salas</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section('main')
<main class="md:ml-25 md:mr-25 fondo-editar-salas flex justify-center">
    <!--inputs de gestión de salas-->
    <form id="formGestionSalas" action="{{ route('editar-espacio', ['id' => $espacio->idespacios]) }}"
        enctype="multipart/form-data" method="POST" x-init="$nextTick(() => cargaFormularioCreacionSalas())"
        class="bg-[--color-general] lg:max-w-[500px] m-1 rounded-lg flex-col flex gap-2 justify-center">
        @csrf
        <div class="w-full flex flex-col gap-2">
            <!--Información básica-->
            <div class="mb-1 bg-gray-50 p-2 md:p-6 rounded-lg shadow-sm">
                <h3 class="mb-2 md:text-2xl justify-center flex gap-2 text-2xl">MODIFICAR ESPACIO</h3>
                <h2 class="text-lg mb-4">Información básica</h2>
                <div class="flex items-center flex-col gap-5">
                    <!-- INPUT NOMBRE TEATRO -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->nombre }}" name="nombre_teatro" id="nombre_teatro"
                        placeholder="Nombre del teatro" required>
                    <!-- INPUT NOMBRE SALA -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->nombre_sala }}" name="nombre_sala" id="nombre_sala"
                        placeholder="Nombre Sala" required>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- INPUT LOCALIDAD -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->localidad }}" name="localidad" id="localidad"
                            placeholder="Localidad" required>
                        <!-- INPUT CODIGO POSTAL -->
                        <input
                            class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                            type="text" value="{{ $espacio->codigopostal }}" name="codigo_postal"
                            id="codigo_postal" placeholder="C.P.">
                    </div>
                    <!-- INPUT DIRECCION -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->direccion }}" name="direccion" id="direccion"
                        placeholder="Dirección" required>
                </div>
            </div>
            <!-- Datos de Contacto -->
            <div class="mb-1 bg-gray-50 p-2 md:p-6 rounded-lg shadow-sm">
                <h2 class="text-lg mb-4">Datos de Contacto</h2>
                <div class="grid gap-4">
                    <!-- INPUT TELEFONO -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none
                            invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->telefono }}" name="telefono" id="telefono"
                        placeholder="Teléfono" required>
                    <!-- INPUT EMAIL -->
                    <input
                        class="inputs-text border border-gray-300 focus:outline-none
                     invalid:focus:ring-red-400 peer w-full "
                        type="email" value="{{ $espacio->email }}" name="email" id="email"
                        placeholder="Correo electrónico" required>

                </div>
            </div>
            <!-- Características del Espacio -->
            <div class="flex flex-col gap-2 mb-1 bg-gray-50 p-2 md:p-6 rounded-lg shadow-sm">
                <h2 class="text-lg mb-4">Características del Espacio</h2>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <!-- SELECT TIPO (Obra / Ensayo) -->
                    <select
                        class="inputs-text border border-gray-300 focus:outline-none
                         invalid:focus:ring-red-400 peer w-full"
                        type="text" value="{{ $espacio->tipo }}" name="tipo_sala" id="tipo_sala">
                        <option value="" class="text-gray-500" disabled selected hidden>Tipo</option>
                        <option value="Obra" class="text-black" @selected($espacio->tipo == 'Obra')>Con público
                        </option>
                        <option value="Ensayo" class="text-black" @selected($espacio->tipo == 'Ensayo')>Ensayo</option>
                    </select>
                    <!-- INPUT Aforo (10 / 20 / 50 personas) -->
                    <select
                        class="inputs-text border focus:outline-none
                            invalid:text-gray-400 invalid:focus:ring-red-400 peer w-full"
                        type="text" name="aforo" id="aforo" required>
                        <option value="" class="text-gray-500" disabled selected hidden>Aforo</option>
                        @foreach (['10' => '10 pers', '20' => '20 pers', '30' => '30 pers', '50' => '50 pers', '75' => '75 pers', '100' => '100 pers', '150' => '150 pers', '200' => '200 pers'] as $clave => $valor)
                        <option value="{{ $clave }}" class="text-black" @selected($espacio->capacidad == $clave)>
                            {{ $valor }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <!-- Input acceso discapacitados -->
                <div class="w-[60%]">
                    <select name="movilidad_reducida" id="movilidad_reducida"
                        class="inputs-text border text-black invalid:text-gray-400 invalid:focus:ring-red-400 peer w-full" required>
                        <option value="" disabled selected hidden>Acceso para discapacitados</option>
                        <option value="Si" class="text-black" @selected($espacio->movilidad_reducida == 'Si')>Mov. reducida - Sí</option>
                        <option value="No" class="text-black" @selected($espacio->movilidad_reducida == 'No')>Mov. reducida - No</option>
                    </select>
                </div>
                <!-- TEXTAREA EQUIPAMIENTO -->
                <textarea
                    class="inputs-text border border-gray-300 min-h-[60px] focus:outline-none
                 invalid:focus:ring-red-400 peer w-full"
                    rows="3" name="equipamiento" id="equipamiento" placeholder="Equipamiento">{{ $espacio->equipamiento }}</textarea>
                <!-- Listado de fotos actuales -->
                <div class="flex overflow-x-auto gap-2 mb-4 mt-4">
                    @foreach ($espacio->fotos as $foto)
                    <div class="relative border p-1 flex-shrink-0">
                        <img src="{{ asset('storage/' . $foto->ruta) }}" alt=""
                            class="w-32 h-24 object-cover rounded">
                        <label class="absolute top-1 right-1 bg-white rounded-full p-1 shadow">
                            <input type="checkbox" name="fotos_borrar[]" value="{{ $foto->id_fotos }}"
                                class="peer sr-only">
                            <!-- ícono de papelera -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 cursor-pointer text-white peer-checked:text-[--color-primario]"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </label>
                    </div>
                    @endforeach
                </div>
                <!-- FOTOS -->
                <div class="flex flex-col gap-3 items-center">
                    <p>Fotos: </p>
                    <input type="file" name="fotos[]" title="Añadir fotos" multiple>
                </div>
                <div class="text-center">
                    @if (session('correcto'))
                    <p class="text-green-500">{{ session('correcto') }}</p>
                    @else
                    <p class="text-red-500">{{ session('error') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!--botones-->
        <div class=" mb-5 flex justify-center gap-4">
            <!--Botón volver-->
            <a type="input" href="{{ url('gestion-salas') }}"
                class="inline-flex w-[61.97] h-[43.99] justify-center items-center button-reserva-a-filtro">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                    <path fill="currentColor"
                        d="M4.4 7.4L6.8 4h2.5L7.2 7h6.3a6.5 6.5 0 0 1 0 13H9l1-2h3.5a4.5 4.5 0 1 0 0-9H7.2l2.1 3H6.8L4.4 8.6L4 8z" />
                </svg>
            </a>
            <!--Botón confirmar modificación-->
            <button type="submit"
                class="button-primary-auto cursor-pointer flex items-center justify-center w-20" title="Confirmar">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1200 1200"
                    stroke="currentColor">
                    <path fill="currentColor"
                        d="M0 0v1200h1200V424.289l-196.875 196.875v381.961h-806.25v-806.25h381.961L775.711 0zm1030.008 15.161l-434.18 434.25L440.7 294.283L281.618 453.438L595.821 767.57l159.082-159.082l434.18-434.25l-159.082-159.081z" />
                </svg>
            </button>
        </div>
    </form>
</div>
    </section>
</main>

@vite('/resources/js/editar-salas.js')

@endsection
