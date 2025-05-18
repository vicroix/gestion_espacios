// Referencias a elementos del DOM
    const btnInfo = document.getElementById("btnInfo");
    const btnMapa = document.getElementById("btnMapa");
    const btnGaleria = document.getElementById("btnGaleria");

    const panelContenedor = document.getElementById("panelContenedor");
    const panelInfo = document.getElementById("panelInfo");
    const panelMapa = document.getElementById("panelMapa");
    const panelGaleria = document.getElementById("panelGaleria");

    const mainFormCont = document.getElementById("mainFormCont");

    // Variable para controlar qué panel está activo
    let panelActivo = null;

    // Función para ocultar todos los paneles y restaurar diseño
    function cerrarPanel() {
        panelContenedor.classList.add("hidden");
        panelInfo.classList.add("hidden");
        panelMapa.classList.add("hidden");
        panelGaleria.classList.add("hidden");
        mainFormCont.classList.remove("ml-[100px]");
        panelActivo = null;
    }

    // Función para mostrar el panel indicado
    function mostrarPanel(nombre) {
        // Si ya está activo, lo cerramos
        if (panelActivo === nombre) {
            cerrarPanel();
            return;
        }

        // Mostrar contenedor si está oculto
        panelContenedor.classList.remove("hidden");

        // Ocultar todos los paneles
        panelInfo.classList.add("hidden");
        panelMapa.classList.add("hidden");
        panelGaleria.classList.add("hidden");

        // Mostrar el panel correspondiente
        if (nombre === "info") {
            panelInfo.classList.remove("hidden");
        }
        if (nombre === "mapa") {
            panelMapa.classList.remove("hidden");
            if (typeof inicializarMapa === "function") {
                inicializarMapa();
            }
        }
        if (nombre === "galeria") {
            panelGaleria.classList.remove("hidden");
        }

        // Aplicar margen al formulario para desplazarlo
        mainFormCont.classList.add("ml-[100px]");

        // Marcar el panel como activo
        panelActivo = nombre;
    }

    // Eventos para cada botón
    btnInfo.addEventListener("click", function () {
        mostrarPanel("info");
    });

    btnMapa.addEventListener("click", function () {
        mostrarPanel("mapa");
    });

    btnGaleria.addEventListener("click", function () {
        mostrarPanel("galeria");
    });
