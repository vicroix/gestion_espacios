document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.getElementById('formGestionSalas');

    formulario.addEventListener("submit", function (event) {
        const nombre_teatro = document.getElementById("nombre_teatro").value;
        const nombre_sala = document.getElementById("nombre_sala").value;
        const telefono = document.getElementById("telefono").value;
        const localidad = document.getElementById("localidad").value;
        const codigo_postal = document.getElementById("codigo_postal").value;
        const direccion = document.getElementById("direccion").value;
        const email = document.getElementById("email").value;
        const tipo_sala = document.getElementById("tipo_sala").value;
        const aforo = document.getElementById("aforo").value;
        const equipamiento = document.getElementById("equipamiento").value;
        //Impedir que se puedan dejar los campos vacios
        if (nombre_teatro === "" || nombre_sala === "" || telefono === "" ||
            localidad === "" || codigo_postal === "" || direccion === "" ||
            email === "" || tipo_sala === "" || aforo === ""
        ) {
            alert("El campo es obligatorio.");
            event.preventDefault(); // Detiene el envío
        }
    })
 //Validación para no permitir letras y limitar el numero de caracteres
    const inputCodigoPostal = document.getElementById("codigo_postal");
    inputCodigoPostal.addEventListener("input", function () {
        if (this.value.length > 5) {
            this.value = this.value.slice(0, 5);
        }
    });
    document.getElementById("telefono").addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "").slice(0, 9);
    });
    document
        .getElementById("codigo_postal")
        .addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, "").slice(0, 5);
        });

})