//Función para asegurar que esta cargado el DOM
document.addEventListener("DOMContentLoaded", function () {
    //
    var divCalendario = document.getElementById("calendario");
    var calendario = new FullCalendar.Calendar(divCalendario, {
      initialView: "dayGridMonth",
      locale: "es",
      events: [
        {
          title: "Evento 1",
          start: "2025-04-05",
          border: "none",
        },
        {
          title: "Evento 2",
          start: "2025-04-10",
        },
        {
          title: "Día festivo",
          start: "2025-04-13",
          end: "2025-04-20",
          classNames: ["dia-festivo"],
        }
      ],
    });
    calendario.render();
  });