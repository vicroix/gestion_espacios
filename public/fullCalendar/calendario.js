window.onload = function () {
    //Obtiene el elemento div del calendario en divCalendario e instanciamos y definimos el constructor de FullCalendar
    var contenedorCalendario = document.getElementById("calendario");
    // Cargar los eventos desde las fuentes
    var rutaFestivos = window.rutaFestivos;
    var rutaReservas = window.rutaReservas;
    var calendario = new FullCalendar.Calendar(contenedorCalendario, {
        initialView: "dayGridMonth",
        locale: "es",

        // Configuración de eventos
        eventSources: [
            {
                url: window.rutaFestivos,
                color: "#990000",
                textColor: "white",
            },
            {
                url: window.rutaReservas,
                color: "#e1b12c",
                textColor: "black",
            },
        ],

        // Al hacer clic en un evento, se muestra la ventana detalles con la información del evento
        eventClick: function (info) {
            console.log(info.event);
            // Obtener la información del evento
            var title = info.event.title;
            var horaInicio = info.event.extendedProps.hora;
            var horaFin = info.event.extendedProps.horaFin;

            var sala = info.event.extendedProps.sala;
            var direccion = "Direccion: " + info.event.extendedProps.direccion;
            var localidad = "Localidad: " + info.event.extendedProps.localidad;

            // Asignar la información a detalles
            if (title === "Festivo") {
                document.getElementById("detallesTitulo").innerText = title;
                document.getElementById("x-cerrar").style.backgroundColor = "#990000";
                document.getElementById("sala").innerText = "";
                document.getElementById("hora").innerText = "";
                document.getElementById("direccion").innerText = "";
                document.getElementById("localidad").innerText = "";
            } else {
                var horaInicioSeparada = horaInicio.substring(0, 5);
                var horaFinSeparada = horaFin.substring(0, 5);
                var horaFormateadas = horaInicioSeparada + " - " + horaFinSeparada;
                document.getElementById("detallesTitulo").innerText = title;
                document.getElementById("sala").innerText = sala;
                document.getElementById("x-cerrar").style.backgroundColor = "#e1b12c";
                document.getElementById("hora").innerText = horaFormateadas;
                document.getElementById("direccion").innerText = direccion;
                document.getElementById("localidad").innerText = localidad;
            }

            // Mostrar contenedor detalles
            document.getElementById("detalles").style.display = "block";
        },

    });

    calendario.render();
};
// Función para cerrar contenedor detalles
function cerrarPopup() {
    document.getElementById("detalles").style.display = "none";
}
