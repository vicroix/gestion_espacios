@extends("layouts.plantilla")

@vite('resources/css/app.css')
@section('title', 'Proximos eventos')
<!-- http://localhost/TeatroGest/public/faq -->

@section("main")
<main class="flex flex-col mt-[50px] ml-4 mr-4 lg:w-full">
    <div class="lg:flex-justify-center lg:self-center border-b-[1px] lg:border-b-1 lg:mx-24 lg:w-[1280px]">
        <h2>Preguntas Frecuentes</h2>
    </div>
    <!--preguntas-->
    <div class="lg:flex-justify-center lg:self-center lg:w-[1280px] mt-5">
        <details>
            <summary>¿Qué es esta plataforma?</summary>
            <p>Esta es una plataforma en línea que permite la gestión y reserva de salas para ensayos y funciones de
                teatro.
                Facilita la organización de espacios y horarios para grupos teatrales, academias y artistas
                independientes.</p>
        </details>

        <details>
            <summary>¿Cómo hago una reserva?</summary>
            <p>Debes iniciar sesión, seleccionar la sala deseada, elegir la fecha y horario disponible, y confirmar la
                reserva.</p>
        </details>

        <details>
            <summary>¿Hay costos asociados a la reserva de salas?</summary>
            <p>Dependiendo del tipo de sala y horario, algunas reservas pueden tener costos.
                Puedes consultar los precios en la sección de tarifas antes de confirmar tu reserva.</p>
        </details>

        <details>
            <summary>¿Puedo cancelar o modificar una reserva?</summary>
            <p>Sí, puedes cancelar o modificar tu reserva desde tu perfil en la sección "Mis reservas".
                Ten en cuenta que algunas modificaciones pueden estar sujetas a políticas de cancelación.</p>
        </details>

        <details>
            <summary>¿Las salas tienen equipamiento disponible?</summary>
            <p>Sí, cada sala cuenta con un equipamiento básico.
                Puedes consultar los detalles del equipamiento de cada sala en la descripción antes de hacer la reserva.
            </p>
        </details>

        <details>
            <summary>¿Qué sucede si llego tarde a mi reserva?</summary>
            <p>El tiempo de uso de la sala comienza en el horario reservado.
                Si llegas tarde, no se extenderá el tiempo de uso, y podría aplicarse una penalización si la ausencia es
                total.</p>
        </details>

        <details>
            <summary>¿Puedo reservar varias salas al mismo tiempo?</summary>
            <p>Dependiendo de la disponibilidad y las políticas del sistema, es posible realizar múltiples reservas.
                Verifica en la plataforma las restricciones aplicables.</p>
        </details>

        <details>
            <summary>¿Se pueden hacer reservas recurrentes?</summary>
            <p>Sí, puedes configurar una reserva recurrente si necesitas la sala con regularidad.
                Consulta la opción "Reservas recurrentes" al realizar la reserva.</p>
        </details>
    </div>
    </section>

</main>
@endsection
