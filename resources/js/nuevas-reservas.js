
// Restringe si la reserva es ese mismo día, seleccionar una hora. Mínimo una hora posterior a la actual.
document.addEventListener("DOMContentLoaded", function () {
    const fechaInput = document.getElementById("fecha");
    const horaInput = document.getElementById("hora");

    // Actualizar hora minima
    function actualizarHoraMinima() {
        const hoy = new Date();
        const fechaSeleccionada = new Date(fechaInput.value);

        if (fechaSeleccionada.toDateString() === hoy.toDateString()) {
            hoy.setHours(hoy.getHours() + 1);
            let horas = hoy.getHours().toString().padStart(2, "0");
            let minutos = hoy.getMinutes().toString().padStart(2, "0");
            const horaMinima = `${horas}:${minutos}`;
            horaInput.min = horaMinima;

            // Si ya hay una hora puesta que es anterior a la minima, la borramos
            if (horaInput.value && horaInput.value < horaMinima) {
                horaInput.value = "";
            }
        } else {
            horaInput.min = "00:00";
        }
    }

    // Actualizar la hora mínima al cargar la página si ya hay una fecha seleccionada
    if (fechaInput.value) {
        actualizarHoraMinima();
    }

    // Cuando cambie la fecha, actualizamos la hora mínima
    fechaInput.addEventListener("change", actualizarHoraMinima);

    // Validar que la hora seleccionada no sea anterior a la mínima
    horaInput.addEventListener("input", function () {
        if (horaInput.value < horaInput.min) {
            horaInput.value = "";
        }
    });
});
