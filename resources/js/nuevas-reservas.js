document.addEventListener("DOMContentLoaded", () => {
    const fechaInput      = document.getElementById("fecha");
    const horaInicioInput = document.getElementById("horaInicio");
    const horaFinInput    = document.getElementById("horaFin");

    // Configuración
    const HORA_APERTURA = "08:00";
    const HORA_CIERRE   = "21:59";
    const NEGAR_MINUTOS = 30; // no reservar hasta +30 min si es hoy

    //Te permite pasar a minutos totales las horas
    function aMinutos(horaStr) {
      if (!horaStr) return -Infinity;
      const [h, m] = horaStr.split(":").map(Number);
      return h * 60 + m;
    }

    //Te convierte los minutos totales a formate "HH:MM"
    function aHoraStr(minutos) {
      const h = Math.floor(minutos / 60);
      const m = minutos % 60;
      return `${String(h).padStart(2, "0")}:${String(m).padStart(2, "0")}`;
    }

    // 1) Ajusta minimo y maximo de horaInicio y horaFin, según la fecha y horario permitido
    function actualizarRestricciones() {
      if (!fechaInput.value) return;
      const hoy = new Date();
      const fechaDeInput = new Date(fechaInput.value);
      const aperturaM = aMinutos(HORA_APERTURA);
      const cierreM   = aMinutos(HORA_CIERRE);

      let minInicioM = aperturaM;
      if (fechaDeInput.toDateString() === hoy.toDateString()) { //Si la fecha introducia en el formulario es igual a la de hoy:
        hoy.setMinutes(hoy.getMinutes() + NEGAR_MINUTOS); //Suma a los minutos actuales los 30 minutos
        const ahoraM = hoy.getHours() * 60 + hoy.getMinutes(); //Ahora convierte las horas y minutos en minutos Totales
        minInicioM = Math.max(aperturaM, ahoraM); //saca el valor más grande (si la de apertura o la de ahora)
      }

      //Si o la hora de Apertura o la hora actual + los 30 min es mayor a la de
      //cierre a minutos totales, desabilita los inputs y además los vacía
      if (minInicioM > cierreM) {
        fechaInput.value = "";
        horaInicioInput.disabled = horaFinInput.disabled = true;
        horaInicioInput.value = horaFinInput.value = "";
        return;
      } else {
        horaInicioInput.disabled = horaFinInput.disabled = false;
      }

      horaInicioInput.min = aHoraStr(minInicioM);
      horaInicioInput.max = HORA_CIERRE;
      //Si el valor del input de Inicio es menor que el de la apertura, o mayor que el de cierre, vacía el input
      if (aMinutos(horaInicioInput.value) < minInicioM ||
          aMinutos(horaInicioInput.value) > cierreM) {
        horaInicioInput.value = "";
      }

      const minFinM = Math.max(minInicioM, aMinutos(horaInicioInput.value)); //Saca cual es mayor, si minInicioM o la introducida en el formulario
      horaFinInput.min = aHoraStr(minFinM);
      horaFinInput.max = HORA_CIERRE;
      //Si el valor de Fin es menos que el de apartura, o mayor que el de cierre, vacía el input
      if (aMinutos(horaFinInput.value) < minFinM ||
          aMinutos(horaFinInput.value) > cierreM) {
        horaFinInput.value = "";
      }
    }

    function actualizarHoraFin() {
      if (!horaInicioInput.value) return;
      const inicioM = aMinutos(horaInicioInput.value); //el input de hora inicio lo pasa a minutos totales
      const finMinM = inicioM + 60; //le suma 1 hora
      const finStr  = aHoraStr(finMinM); //pasa en formate "HH:MM"
      horaFinInput.min = finStr;
      //Si el input de fin es menor que la de inicio con un margen de 1 hora añadida, vacía el input de fin.
      if (aMinutos(horaFinInput.value) < finMinM) {
        horaFinInput.value = "";
      }
    }

    // Asegura que al cargar la página, asigna a los inputs inicio y fin el atributo min y max de las restricciones
    window.addEventListener("load", () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });

    // Al cambiar algo en el input de fecha asigna las restricciones min y max también
    fechaInput.addEventListener("change",   () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });
    horaInicioInput.addEventListener("input", () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });
  });
