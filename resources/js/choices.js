window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        cargaFormularioReservarSala();
    }, 50);
});
window.cargaFormularioReservarSala = function () {
    setTimeout(() => {
        const elementosSelect = document.getElementById("grupos");
        if (!elementosSelect) return;

        if (elementosSelect.choicesInstance) {
            elementosSelect.choicesInstance.destroy();
        }
        // Crear selected de grupos
        const choices = new Choices(elementosSelect, {
            removeItemButton: true,
            placeholderValue: "Selecciona grupos...",
            noResultsText: "No se encontraron resultados",
            noChoicesText: "No hay opciones disponibles",
        });
        if (spinner) spinner.style.display = "none";
        select.classList.remove("select-loading");
    }, 0);
};
