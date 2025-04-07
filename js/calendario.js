//Función para asegurar que esta cargado el DOM
document.addEventListener("DOMContentLoaded", function () {
  //Obtiene el elemento div del calendario en divCalendario e instanciamos y definimos el constructor de FullCalendar
  var divCalendario = document.getElementById("calendario");
  var calendario = new FullCalendar.Calendar(divCalendario, {
    initialView: "dayGridMonth",
    locale: "es",
  });
  //Función para leer archivo JSON
  function cargarEventosDesdeJSON(urlArchivoJSON, calendario) {
    fetch(urlArchivoJSON)
      .then((response) => response.json())
      .then((eventos) => {
        eventos.forEach((evento) => {
          calendario.addEvent(evento);
        });
      })
      .catch((error) => {
        console.error("Error al cargar eventos desde JSON:", error);
      });
  }
  cargarEventosDesdeJSON(
    "../libs/fullCalendar/calendario-2025.json",
    calendario
  );
  calendario.render();
});
