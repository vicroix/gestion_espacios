@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/teatrogest/public/proximos-eventos -->

@section("main")
<main class="flex content-center md:block">
    <!--Documentación del calendario: https://fullcalendar.io/docs -->
    <div id="calendario" class="flex align-center"></div>
</main>

<script src="{{ asset('fullCalendar/index.global.min.js') }}"></script>
<script src="{{ asset('fullCalendar/calendario.js') }}"></script>
@endsection
