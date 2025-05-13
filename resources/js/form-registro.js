
//Función para que no permita dejar campos vacios
document.getElementById('formRegistro').addEventListener('submit', function (event) {

    const nombre = document.getElementById('nombre').value.trim;
    const apellidos = document.getElementById('apellidos').value;
    const usuario = document.getElementById('usuario').value.trim;
    const password = document.getElementById('password').value.trim;
    const email = document.getElementById('email').value.trim;
    const telefono = document.getElementById('telefono').value.trim;

    if (nombre === '') {
        alert('El nombre es obligatorio.');
        event.preventDefault(); // Detiene el envío
    }
    if (apellidos === '') {
        alert('El campo apellidos es obligatorio.');
        event.preventDefault(); // Detiene el envío
    }
    if (usuario === '') {
        alert('El usuario es obligatorio.');
        event.preventDefault(); // Detiene el envío
    }
    if (password === '') {
        alert('El campo contraseña es obligatorio.');
        event.preventDefault(); // Detiene el envío
    }
    if (email === '') {
        alert('El campo correo es obligatorio.');
        event.preventDefault(); // Detiene el envío
    }

});

//Validación para no permitir números
document.getElementById('nombre').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
})
//Validación para no permitir números
document.getElementById('apellidos').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
})
//Validación para no permitir letras
document.getElementById('telefono').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
})
//Validación correo

document.getElementById('email').addEventListener('submit', function () {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        event.preventDefault();
    }
})

//Validación contraseña
document.getElementById('formRegistro').addEventListener('submit', function (event) {
    const password = getElementById('password').value.trim;
    const cumpleRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/;
    const mensaje = document.getElementById("mensaje");
    if (cumpleRegex.test(password)) {
        mensaje.style.color = "green";
        mensaje.textContent = "Contraseña válida.";
    } else {
        mensaje.style.color = "red";
        mensaje.textContent = "La contraseña debe incluir 1 mayúscula, 1 minúscula, 1 número y al menos 6 carácteres";
        event.preventDefault();
    }
});
