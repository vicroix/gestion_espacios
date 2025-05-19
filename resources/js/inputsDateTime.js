const fechaInput = document.getElementById("fecha");
const horaInicioInput = document.getElementById("horaInicio");
const horaFinInput = document.getElementById("horaFin");
const modoEditarReserva =
    document.getElementById("modoEditarReserva")?.value === "true";

function añadirEstilo(input, color) {
    input.classList.add(`border-${color}-500`);
}
function quitarEstilo(input, color) {
    input.classList.remove(`border-${color}-500`);
}

// Configuración
const HORA_APERTURA = "08:00";
const HORA_CIERRE = "21:59";
const NEGAR_MINUTOS = 30; // no reservar hasta +30 min si es hoy

//Te permite pasar a minutos totales las horas
function aMinutos(horaStr) {
    if (!horaStr) return -Infinity;
    const [h, m] = horaStr.split(":").map(Number);
    return h * 60 + m;
}

//Te convierte los minutos totales a formato "HH:MM"
function aHoraStr(minutos) {
    const h = Math.floor(minutos / 60);
    const m = minutos % 60;
    return `${String(h).padStart(2, "0")}:${String(m).padStart(2, "0")}`;
}

// 1) Ajusta minimo y maximo de horaInicio y horaFin, según la fecha y horario permitido
function actualizarRestricciones() {
    quitarEstilo(horaInicioInput, "green")
    quitarEstilo(horaFinInput, "green")
    if (!fechaInput.value) return;
    const hoy = new Date();
    const fechaDeInput = new Date(fechaInput.value);
    const aperturaM = aMinutos(HORA_APERTURA);
    const cierreM = aMinutos(HORA_CIERRE);

    let minInicioM = aperturaM;
    if (fechaDeInput.toDateString() === hoy.toDateString()) {
        //Si la fecha introducida en el formulario es igual a la de hoy:
        hoy.setMinutes(hoy.getMinutes() + NEGAR_MINUTOS); //Suma a los minutos actuales los 30 minutos
        const ahoraM = hoy.getHours() * 60 + hoy.getMinutes(); //Ahora convierte las horas y minutos en minutos totales
        minInicioM = Math.max(aperturaM, ahoraM); //saca el valor más grande (si la de apertura o la de ahora)
    }

    // Si o la hora de apertura o la hora actual + los 30 min es mayor a la de cierre menos una hora (21:59 - 1h), deshabilita los inputs y los vacía
    if (minInicioM > cierreM - 60) {
        fechaInput.value = "";
        horaInicioInput.disabled = horaFinInput.disabled = true;
        horaInicioInput.value = horaFinInput.value = "";

        return;
    } else {
        horaInicioInput.disabled = horaFinInput.disabled = false;
    }

    horaInicioInput.min = aHoraStr(minInicioM);
    horaInicioInput.max = aHoraStr(cierreM - 60); // Nueva restricción: no dejar que empiece a las 22:00

    //Si el valor del input de Inicio es menor que el de la apertura o mayor que el de cierre - 1h, vacía el input
    if (
        (!modoEditarReserva && aMinutos(horaInicioInput.value) < minInicioM) ||
        aMinutos(horaInicioInput.value) > cierreM - 60
    ) {
        añadirEstilo(horaInicioInput, "red");
        horaInicioInput.value = "";
    } else {
        añadirEstilo(horaInicioInput, "green");
    }

    const minFinM = Math.max(
        minInicioM + 60,
        aMinutos(horaInicioInput.value) + 60
    ); // Asegura que mínimo sea una hora después
    horaFinInput.min = aHoraStr(minFinM);
    horaFinInput.max = HORA_CIERRE;
    if (!horaFinInput.value) return;
    //Si el valor de hora_fin es menor que el mínimo o mayor que el de cierre, vacía el input
    if (
        (!modoEditarReserva && aMinutos(horaFinInput.value) < minFinM) || //20:45 < 8:00 || 20:45 > 22:00
        aMinutos(horaFinInput.value) > cierreM
    ) {
        horaFinInput.value = "";
    } else {

    }
}

// Ajusta restricciones de la horaFin al cambiar la horaInicio
function actualizarHoraFin() {
    if (!horaInicioInput.value) return;
    const inicioM = aMinutos(horaInicioInput.value); //el input de hora inicio lo pasa a minutos totales
    const finMinM = inicioM + 60; //le suma 1 hora
    const cierreM = aMinutos(HORA_CIERRE);
    const finStr = aHoraStr(finMinM); //pasa en formato "HH:MM"

    horaFinInput.min = finStr;
    horaFinInput.max = HORA_CIERRE;

    //Si el input de hora_fin es menor que la de inicio con un margen de 1 hora añadida, vacía el input de fin.
    if (
        (!modoEditarReserva && aMinutos(horaFinInput.value) < finMinM) ||
        aMinutos(horaFinInput.value) > cierreM
    ) {
         añadirEstilo(horaFinInput, "red");
        horaFinInput.value = "";
    } else {
        añadirEstilo(horaFinInput, "green")
    }
}

// Validación estricta manual de horaFin al escribir
horaFinInput.addEventListener("input", () => {
    const cierreM = aMinutos(HORA_CIERRE);
    const inicioM = aMinutos(horaInicioInput.value);
    const finM = aMinutos(horaFinInput.value);

    // Si se pasa de las 21:59 o es menor que inicio+1h, o si escribe "00:00", "00:30", etc., vacía
    if (finM > cierreM || finM < inicioM + 60 || finM < 0 || finM >= 1440) {
         añadirEstilo(horaFinInput, "red");
        horaFinInput.value = "";
    }
});

// Asegura que al cargar la página, asigna a los inputs inicio y fin el atributo min y max de las restricciones
window.addEventListener("load", () => {
    actualizarRestricciones();
    actualizarHoraFin();
});

// Al cambiar algo en el input de fecha asigna las restricciones min y max también
fechaInput.addEventListener("change", () => {
    actualizarRestricciones();
    actualizarHoraFin();
});
horaInicioInput.addEventListener("input", () => {
    actualizarRestricciones();
    actualizarHoraFin();
});
horaFinInput.addEventListener("input", () => {
    actualizarRestricciones();
    actualizarHoraFin();
});
