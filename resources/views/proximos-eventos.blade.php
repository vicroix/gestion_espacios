@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/proximos-eventos -->

@section("main")
<main class="flex content-center md:block">
    <!--Documentación del calendario: https://fullcalendar.io/docs -->
    <div id="calendario" class="flex align-center"></div>
    <div id="detalles" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.8); color: white; padding: 20px; z-index: 9999; border-radius: 10px; width: 300px; text-align: center;">
        <h3 id="detallesTitulo"></h3>
        <p id="localidad"></p>
        <p id="direccion"></p>
        <p id="hora"></p>
        <p id="horaFin"></p>
        <button onclick="cerrarPopup()">Cerrar</button>
    </div>
</main>
<script>
    // Asignar las rutas relativas
    window.rutaFestivos = "{{ asset('fullCalendar/calendario-2025.json') }}";
    window.rutaReservas = "{{ url('api/eventos') }}";
</script>
<script src="{{ asset('fullCalendar/index.global.min.js') }}"></script>
<script src="{{ asset('fullCalendar/calendario.js') }}"></script>
@endsection
