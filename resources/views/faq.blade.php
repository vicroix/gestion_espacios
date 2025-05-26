@extends("layouts.plantilla")
@extends("layouts.inicio-sesion")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/faq -->

<title>FAQ</title>
<link rel="icon" type="image/png" href="/img/Logo.png">

@section("main")
<main class="mt-[50px]">
    <div class="flex justify-center mb-5">
        <div class="titulo-main w-full flex justify-center md:mx-[70px]">
            <h3 class="mt-5 md:text-2xl text-2xl">PREGUNTAS FRECUENTES</h3>
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            <!--preguntas-->
            <div class="flex flex-col gap-2">
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Qué es esta plataforma?</summary>
                        <p class="mt-5">Esta es una plataforma en línea que permite la gestión y reserva de salas para ensayos y funciones de
                            teatro.
                            Facilita la organización de espacios y horarios para grupos teatrales, academias y artistas
                            independientes.</p>
                    </details>
                
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Cómo hago una reserva?</summary>
                        <p class="mt-5">Debes iniciar sesión, seleccionar la sala deseada en <a href="{{ url('gestion-salas') }}" class="text-[#990000]"><strong>Gestión salas</strong></a>, elegir la fecha y horario disponible, y confirmar la
                            reserva.</p>
                    </details>
               

                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Hay costos asociados a la reserva de salas?</summary>
                        <p class="mt-5">Dependiendo del tipo de sala y horario, algunas reservas pueden tener costos.
                            Puedes consultar los precios en la sección de tarifas antes de confirmar tu reserva.</p>
                    </details>
               
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Puedo cancelar o modificar una reserva?</summary>
                        <p class="mt-5">Sí, puedes cancelar o modificar tu reserva desde tu perfil en la sección <a href="{{ url('gestion-reservas') }}" class="text-[#990000]"><strong>Reservas</strong></a>. Ten en cuenta que algunas modificaciones pueden estar sujetas a políticas de cancelación.</p>
                    </details>
            </div>
            <div class="flex flex-col gap-2">
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Las salas tienen equipamiento disponible?</summary>
                        <p class="mt-5">Sí, cada sala cuenta con un equipamiento básico.
                            Puedes consultar los detalles del equipamiento de cada sala en la descripción antes de hacer la reserva.
                        </p>
                    </details>
                
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Qué sucede si llego tarde a mi reserva?</summary>
                        <p class="mt-5">El tiempo de uso de la sala comienza en el horario reservado.
                            Si llegas tarde, no se extenderá el tiempo de uso, y podría aplicarse una penalización si la ausencia es
                            total.</p>
                    </details>
                
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Puedo reservar varias salas al mismo tiempo?</summary>
                        <p class="mt-5">Dependiendo de la disponibilidad y las políticas del sistema, es posible realizar múltiples reservas.
                            Verifica en la plataforma las restricciones aplicables.</p>
                    </details>
                
                    <details class="mb-1 hover:bg-slate-100/85 p-4 rounded-lg shadow cursor-pointer open:border-t-4 open:border-[#990000]">
                        <summary>¿Se pueden hacer reservas recurrentes?</summary>
                        <p class="mt-5">Sí, puedes configurar una reserva recurrente si necesitas la sala con regularidad.
                            Consulta la opción "Reservas recurrentes" al realizar la reserva.</p>
                    </details>
            </div>
        </div>
    </div>
    </section>

</main>
@endsection
