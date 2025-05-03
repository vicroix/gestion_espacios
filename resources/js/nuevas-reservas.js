// Restringe si la reserva es ese mismo día, seleccionar una hora. Mínimo una hora posterior a la actual.
document.addEventListener("DOMContentLoaded", function () {
    const fechaInput = document.getElementById("fecha");
    const horaInicioInput = document.getElementById("horaInicio");
    const horaFinInput = document.getElementById("horaFin");

    // Función para actualizar las horas mínimas
    function actualizarHoraMinima() {
        const hoy = new Date();
        const fechaSeleccionada = new Date(fechaInput.value);

        if (fechaSeleccionada.toDateString() === hoy.toDateString()) {
            hoy.setHours(hoy.getHours() + 1); // Si es hoy, que la hora mínima de inicio sea la actual + 1 hora
            let horas = hoy.getHours().toString().padStart(2, "0");
            let minutos = hoy.getMinutes().toString().padStart(2, "0");
            const horaMinima = `${horas}:${minutos}`;
            horaInicioInput.min = horaMinima;

            // Si ya hay una hora puesta que es anterior a la mínima, la borramos
            if (horaInicioInput.value < horaMinima) {
                horaInicioInput.value = "";
            }

            // Si horaFin es menor que horaInicio, la reseteamos
            if (horaFinInput.value < horaInicioInput.value) {
                horaFinInput.value = "";
            }
        } else {
            horaInicioInput.min = "00:00"; // Si la fecha no es hoy, permite cualquier hora
        }
    }

    // Función para actualizar horaFin en función de horaInicio
    function actualizarHoraFin() {
        if (horaInicioInput.value) {
            const [hora, minutos] = horaInicioInput.value.split(":");
            const horaInicioDate = new Date();
            horaInicioDate.setHours(hora, minutos);

            // Sumamos una hora a la hora de inicio
            const horaFinDate = new Date(horaInicioDate);
            horaFinDate.setHours(horaFinDate.getHours() + 1);

            // Convertimos la hora fin en formato de cadena para compararla
            const horaMinimaFin = `${horaFinDate.getHours().toString().padStart(2, "0")}:${horaFinDate.getMinutes().toString().padStart(2, "0")}`;
            horaFinInput.min = horaMinimaFin;

            // Si horaFin es menor que horaInicio o dentro de la misma hora de inicio hasta 1 hora después, la reseteamos
            if (horaFinInput.value < horaMinimaFin) {
                horaFinInput.value = "";
            }
        }
    }

    // Actualizar la hora mínima al cargar la página si ya hay una fecha seleccionada
    if (fechaInput.value) {
        actualizarHoraMinima();
    }

    // Cuando cambie la fecha, actualizamos la hora mínima
    fechaInput.addEventListener("change", actualizarHoraMinima);

    // Cuando cambie horaInicio, actualizamos horaFin
    horaInicioInput.addEventListener("input", actualizarHoraFin);

    // Validar que la hora seleccionada no sea anterior a la mínima
    horaInicioInput.addEventListener("input", function () {
        if (horaInicioInput.value < horaInicioInput.min) {
            horaInicioInput.value = "";
        }
    });

    horaFinInput.addEventListener("input", function () {
        if (horaFinInput.value < horaFinInput.min) {
            horaFinInput.value = "";
        }
    });
});


