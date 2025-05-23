window.cargaFormularioReservarSala = function () {
    // Referencias a los botones del DOM
    const btnInfo = document.getElementById("btnInfo");
    const btnMapa = document.getElementById("btnMapa");
    const btnGaleria = document.getElementById("btnGaleria");

    // Referencias a los paneles
    const panelContenedor = document.getElementById("panelContenedor");
    const panelInfo = document.getElementById("panelInfo");
    const panelMapa = document.getElementById("panelMapa");
    const panelGaleria = document.getElementById("panelGaleria");

    const elementosSelect = document.getElementById("grupos");
    // Crear selected de grupos
    const choices = new Choices(elementosSelect, {
        removeItemButton: true,
        placeholderValue: "Selecciona grupos...",
        noResultsText: "No se encontraron resultados",
        noChoicesText: "No hay opciones disponibles",
    });
    //Mirar si supera el espacio los grupos seleccionados y avisar
    document
        .getElementById("formularioReservarSala")
        .addEventListener("submit", (event) => {
            const capacidadEspacio = parseInt(document.getElementById("capacidadEspacio").value);
            const selectedSeleccionados = document.querySelectorAll(
                "#grupos option:checked"
            );

            let sumaGroupSize = 0;
            selectedSeleccionados.forEach((option) => {
                sumaGroupSize += parseInt(option.dataset.groupsize);
            });

            if (sumaGroupSize > capacidadEspacio) {
                const confirmar = confirm(
                    "¡Superaste la capacidad del espacio! ¿Seguro que quieres reservar?"
                );
                if (!confirmar) {
                    event.preventDefault();
                }
            }
        });

    // Antes de enviar formulario
    const formulario = document.getElementById("formularioReservarSala");
    formulario.addEventListener("submit", () => {});

    // Variable para llevar el control del panel que está abierto actualmente
    let panelActivo = null;

    // Función para cerrar el panel
    function cerrarPanel() {
        const esGrande = window.innerWidth >= 1024;

        // Oculta todos los paneles internos
        panelInfo.classList.add("hidden");
        panelMapa.classList.add("hidden");
        panelGaleria.classList.add("hidden");

        if (esGrande) {
            // En pantallas grandes, simplemente lo oculta
            panelContenedor.classList.add("hidden");
        } else {
            // En móviles: desliza hacia abajo
            panelContenedor.classList.add("translate-y-full");

            // Después de la transición, oculta el elemento
            setTimeout(function () {
                panelContenedor.classList.add("hidden");
            }, 500);
        }

        panelActivo = null;
    }

    // Función para mostrar el panel
    function mostrarPanel(nombre) {
        const esGrande = window.innerWidth >= 768;

        if (panelActivo === nombre) {
            cerrarPanel();
            return;
        }

        // Oculta todos los subpaneles
        panelInfo.classList.add("hidden");
        panelMapa.classList.add("hidden");
        panelGaleria.classList.add("hidden");

        // Muestra el correcto
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

        if (esGrande) {
            panelContenedor.classList.remove("hidden");
        } else {
            panelContenedor.classList.remove("hidden");

            // Forzar reflow para que la animación se reinicie
            void panelContenedor.offsetWidth;

            // Remover clase de ocultar (deslizar arriba)
            panelContenedor.classList.remove("translate-y-full");
        }

        panelActivo = nombre;
    }

    // Eventos
    btnInfo.addEventListener("click", function () {
        mostrarPanel("info");
    });
    btnMapa.addEventListener("click", function () {
        mostrarPanel("mapa");
    });
    btnGaleria.addEventListener("click", function () {
        mostrarPanel("galeria");
    });
};
