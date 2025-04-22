@extends("layouts.plantilla")
<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet"/>
@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/busquedas-salas -->

@section("main")
<main class="m-4">
    <h1 class="text-[#990000] self-start">Búsqueda de sala</h1>
    <hr class="text-[#990000]">

    <section class="flex flex-col items-center justify-center gap-9">
        <!--Listado este listado hay que conectarlo con la BBDD para conectarlo-->
        <div>
            <select class="w-80 border-2 rounded-lg mt-9">
                <option value="1">Sala 1</option>
                <option value="2">Sala 2</option>
                <option value="3">Sala 3</option>
            </select>
        </div>
        <!--Mapa interactivo-->
        <div class="w-[800px] h-[500px] shadow">
            <div id="contenedor-del-mapa" class="absolute w-[800px] h-[500px]"></div>
        </div>
        <div>
            <a href="{{ url('pago') }}"
                class="bg-[#990000] hover:bg-[#a84848] text-white p-2 rounded-lg w-auto mx-auto my-8 cursor-pointer">Reservar</a>
        </div>
    </section>

</main>
<script src="{{ asset('mapa/mapa.js') }}"></script>
@endsection
