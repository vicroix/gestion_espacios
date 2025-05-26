@extends("layouts.plantilla")
@extends("layouts.inicio-sesion")

@vite(['resources/css/app.css', 'resources/css/proximos-eventos.css'])
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/proximos-eventos -->

<title>Eventos</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<div>
    <!--Documentación del calendario: https://fullcalendar.io/docs -->
    <div id="calendario" class="flex align-center min-w-[320px] lg:max-w-[460px] xl:max-w-[680px] 2xl:max-w-[530px] 3xl:max-w-[640px] 4xl:max-w-[960px]"></div>
    <div id="detalles">
        <div id="x-cerrar">
            <button onclick="cerrarPopup()" class="button-x-cerrar"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m12 13.4l-2.9 2.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l2.9-2.9l-2.9-2.875q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l2.9 2.9l2.875-2.9q.275-.275.7-.275t.7.275q.3.3.3.713t-.3.687L13.375 12l2.9 2.9q.275.275.275.7t-.275.7q-.3.3-.712.3t-.688-.3z" />
                </svg></button>
        </div>
        <h3 id="detallesTitulo"></h3>
        <p id="sala"></p>
        <p id="localidad"></p>
        <p id="direccion"></p>
        <p id="hora"></p>
    </div>
</div>

<script>
    // Asignar las rutas relativas
    window.rutaFestivos = "{{ asset('fullCalendar/calendario-2025.json') }}";
    window.rutaReservas = "{{ url('api/eventos') }}";
</script>
<script src="{{ asset('fullCalendar/index.global.min.js') }}"></script>
<script src="{{ asset('fullCalendar/calendario.js') }}"></script>
@endsection
