document.addEventListener("DOMContentLoaded", () => {
    const fechaInput      = document.getElementById("fecha");
    const horaInicioInput = document.getElementById("horaInicio");
    const horaFinInput    = document.getElementById("horaFin");

    // Configuración
    const HORA_APERTURA = "08:00";
    const HORA_CIERRE   = "21:59";
    const NEGAR_MINUTOS = 30; // no reservar hasta +30 min si es hoy


    function aMinutos(horaStr) {
      if (!horaStr) return -Infinity;
      const [h, m] = horaStr.split(":").map(Number);
      return h * 60 + m;
    }
    function aHoraStr(minutos) {
      const h = Math.floor(minutos / 60);
      const m = minutos % 60;
      return `${String(h).padStart(2, "0")}:${String(m).padStart(2, "0")}`;
    }

    // 1) Ajusta min/max de horaInicio y horaFin según fecha y horario permitido
    function actualizarRestricciones() {
      if (!fechaInput.value) return;

      const hoy      = new Date();
      const fechaSel = new Date(fechaInput.value);
      const aperturaM = aMinutos(HORA_APERTURA);
      const cierreM   = aMinutos(HORA_CIERRE);

      // Cálculo de mínimo dinámico
      let minInicioM = aperturaM;
      if (fechaSel.toDateString() === hoy.toDateString()) {
        hoy.setMinutes(hoy.getMinutes() + NEGAR_MINUTOS);
        const ahoraM = hoy.getHours() * 60 + hoy.getMinutes();
        minInicioM = Math.max(aperturaM, ahoraM);
      }

      // Si ya no hay franjas válidas
      if (minInicioM > cierreM) {
        fechaInput.value = "";
        horaInicioInput.disabled = horaFinInput.disabled = true;
        horaInicioInput.value = horaFinInput.value = "";
        return;
      } else {
        horaInicioInput.disabled = horaFinInput.disabled = false;
      }

      // Aplica min/max a horaInicio
      horaInicioInput.min = aHoraStr(minInicioM);
      horaInicioInput.max = HORA_CIERRE;
      if (aMinutos(horaInicioInput.value) < minInicioM ||
          aMinutos(horaInicioInput.value) > cierreM) {
        horaInicioInput.value = "";
      }

      // Ajusta min/max de horaFin para que sea ≥ inicio y ≤ cierre
      const minFinM = Math.max(minInicioM, aMinutos(horaInicioInput.value));
      horaFinInput.min = aHoraStr(minFinM);
      horaFinInput.max = HORA_CIERRE;
      if (aMinutos(horaFinInput.value) < minFinM ||
          aMinutos(horaFinInput.value) > cierreM) {
        horaFinInput.value = "";
      }
    }

    // 2) Ajusta la horaFin para que al menos sea +1 h de la horaInicio
    function actualizarHoraFin() {
      if (!horaInicioInput.value) return;
      const inicioM = aMinutos(horaInicioInput.value);
      const finMinM = inicioM + 60;
      const finStr  = aHoraStr(finMinM);
      horaFinInput.min = finStr;
      if (aMinutos(horaFinInput.value) < finMinM) {
        horaFinInput.value = "";
      }
    }


    // Al cargar la página (por si hay valores precargados)
    window.addEventListener("load", () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });

    // Al cambiar la fecha o la hora de inicio
    fechaInput.addEventListener("change",   () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });
    horaInicioInput.addEventListener("input", () => {
      actualizarRestricciones();
      actualizarHoraFin();
    });
  });

