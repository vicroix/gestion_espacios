window.rellenarFormulario = function (
    nombre,
    localidad,
    codigopostal,
    capacidad,
    tipo,
    idespacios,
    direccion,
) {
    document.getElementById("nombreTeatro").value = nombre;
    document.getElementById("LocalidadTeatro").value = localidad;
    document.getElementById("codigoPostal").value = codigopostal;
    document.getElementById("id_espacio").value = idespacios;
    document.getElementById('direccion').value = direccion;
    document.getElementById('nombreTeatro').value = nombre;

    // Insertar los datos en el selected de Tipo de Sala
    if (tipo.toLowerCase() === "ensayo") {
        document.getElementById("tipoSala").value = "Ensayo";
    } else if (tipo.toLowerCase() === "obra") {
        document.getElementById("tipoSala").value = "Obra";
    }

    // Insertar los datos en el selected de Aforo
    if (capacidad === "10") {
        document.getElementById("aforo").value = "10";
    } else if (capacidad === "20") {
        document.getElementById("aforo").value = "20";
    } else if (capacidad === "50") {
        document.getElementById("aforo").value = "50";
    }
};

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
