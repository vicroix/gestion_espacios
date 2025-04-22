@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/modificar-salas -->

@section("main")
<main class="ml-25 mr-25">
    <h2 class="titulo_pagina">MODIFICAR SALA</h2>
    <div>
        <form class="flex  w-80 mt-6 h-[50px]">
            <input class="rounded-md border-1 border-black" type="text" name="buscadorSala" id="buscadorSala"
                placeholder="Introduzca una sala">
            <input class="bg-[#990000] p-2 py-2 text-white rounded-md cursor-pointer hover:bg-[#a84848]" alt="boton enviar
            " type="image" src="img/Search.png">
        </form>

    </div>
    <br \>
    <br \>
    <div class="flex">

        <h3 class="w-1/2">Filtros Avanzados</h3>
        <div class="flex justify-center w-1/2">
            <div class="flex">
                <!---Filtro de provincia-->
                <div>
                    <h4>Provincia</h4>
                    <select>
                        <option value="Sevilla">Sevilla</option>
                        <option value="Cádiz">Cádiz</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Huelva">Huelva</option>
                    </select>
                </div>
                <div>
                    <!---Slider de capacidad-->
                    <h4>Capacidad</h4>
                    <input type="range" min="Pequeña" max="Grande" value="Mediana" id="capacidad"
                        alt="Pequeña, mediana o grande" class="slider">
                    <label for="capacidad">100 PAX</label>
                    <h6></h6>
                </div>
            </div>

        </div>
    </div>

    <!---Tabla-->
    <div class="mt-10 mb-10">
        <table border="1" class="w-full">
            <thead>
                <tr>
                    <th>Nombre teatro</th>
                    <th>Provincia</th>
                    <th>CP</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Aforo</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                </tr>
                <tr>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                </tr>
                <tr>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                    <td>ejemplo</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection
