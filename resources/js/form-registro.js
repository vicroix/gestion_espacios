document.getElementById('formRegistro').addEventListener('submit', function (event) {


    const nombre = document.getElementById('nombre').value;
    const apellidos = document.getElementById('apellidos').value;
    const usuario = document.getElementById('usuario').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;

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

document.getElementById('nombre').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
})
document.getElementById('apellidos').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s-]/g, '');
})
document.getElementById('telefono').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
})