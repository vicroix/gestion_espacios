
// Validaciones de entrada al cargar la página
document.addEventListener("DOMContentLoaded", function () {

    // Solo permitir letras en nombre y apellidos
    document.getElementById('nombre').addEventListener('input', function () {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
    });

    document.getElementById('apellidos').addEventListener('input', function () {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
    });

    // Solo permitir números en teléfono
    document.getElementById('telefono').addEventListener('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Validación general al enviar el formulario
    document.getElementById('formRegistro').addEventListener('submit', function (event) {
        const nombre = document.getElementById('nombre').value.trim();
        const apellidos = document.getElementById('apellidos').value.trim();
        const usuario = document.getElementById('usuario').value.trim();
        const password = document.getElementById('password').value.trim();
        const email = document.getElementById('email').value.trim();
        const mensaje = document.getElementById("mensaje");

        // Validación de campos vacíos
        if (nombre === '' || apellidos === '' || usuario === '' || password === '' || email === '') {
            alert('Por favor, rellena todos los campos obligatorios.');
            event.preventDefault();
            return;
        }

        // Validación de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Correo electrónico no válido.');
            event.preventDefault();
            return;
        }

        // Validación de contraseña segura
        const cumpleRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/;
        if (!cumpleRegex.test(password)) {
            mensaje.style.color = "red";
            mensaje.textContent = "La contraseña debe incluir 1 mayúscula, 1 minúscula, 1 número y al menos 6 caracteres.";
            event.preventDefault();
            return;
        } else {
            mensaje.textContent = "";
        }
    });
});


