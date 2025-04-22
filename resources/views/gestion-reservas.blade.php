@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/gestion-reservas -->

@section("main")
<main class="flex flex-col w-full items-center sm:mt-[50px] gap-4 md:lg-9 lg:gap-12 h-[59vh]">
    <div class="titulo-gestion-reservas flex justify-start lg:mx-24">
        <h3 class="px-2 lg:px-8">PANEL DE GESTIÓN DE RESERVAS</h3>
    </div>
    <form class="flex flex-col justify-center gap-8">
        <div class="flex flex-col gap-1">
            <div class="flex gap-4">
                <div class="flex flex-col gap-2 sm:flex sm:flex-row">
                    <div class="flex flex-row-reverse sm:flex sm:flex-row items-end gap-3">
                        <div class="flex items-end gap-2">
                            <button class="button-secundary-auto">Anular</button>
                            <button class="button-primary-auto">Modificar</button>
                        </div>
                        <select id="sala" name="sala" class="gestion-reservas-select">
                            <option value="sala1">Sala 1</option>
                            <option value="sala2">Sala 2</option>
                        </select>
                    </div>
                    <div class="gestion-reservas-contenedor-date flex flex-col sm:self-center">
                        <label for="fechaReserva">Fecha de Reserva:</label>
                        <input type="date" id="fechaReserva" name="fechaReserva" class="inputs-text">
                    </div>
                    <div class="flex gap-2">
                        <div class="gestion-reservas-contenedor-time flex flex-col">
                            <label for="horaInicio">Hora Inicio:</label>
                            <input type="time" id="horaInicio" name="horaInicio" class="inputs-text">
                        </div>
                        <div class="gestion-reservas-contenedor-time flex flex-col">
                            <label for="horaFin">Hora Fin:</label>
                            <input type="time" id="horaFin" name="horaFin" class="inputs-text">
                        </div>
                    </div>
                </div>
                <!-- <div class="flex items-end gap-2">
                        <button class="button-primary-auto">Modificar</button>
                        <button class="button-secundary-auto">Anular</button>
                    </div> -->
            </div>
        </div>
        <button class="button-primary-auto flex items-center justify-center align-center self-center w-[100px]">
            Reservar
        </button>
    </form>
</main>

@endsection
