@extends('layouts.plantilla')

@section('title', 'Proximos eventos')
@vite('resources/css/nuevas-reservas.css')

<head>
    <title>Busqueda salas</title>
    <link rel="icon" type="image/png" href="/img/Logo.png">
</head>
@section('main')
<div x-data="{ mostrarFiltroEspacios: @json($mostrarFiltroEspacios) }">
    <template x-if="mostrarFiltroEspacios">
        @include('layouts.filtro-espacios')
    </template>

    <template x-if="!mostrarFiltroEspacios">
        @include('layouts.creacion-salas')
    </template>
</div>
@vite('resources/js/gestion-salas.js')
@endsection
