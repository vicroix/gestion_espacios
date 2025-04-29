document.getElementById("formGestionSalas").addEventListener('submit', function(event){

const nombre_teatro=document.getElementById('nombre_teatro').value;
const nombre_sala=document.getElementById('nombre_sala').value;
const telefono=document.getElementById('nombre_telefono').value;
const localidad=document.getElementById('localidad').value;
const codigo_postal=document.getElementById('codigo_postal').value;
const direccion=document.getElementById('direccion').value;
const email=document.getElementById('email').value;
const tipo_sala=document.getElementById('tipo_sala').value;
const aforo=document.getElementById('aforo').value;
const equipamiento=document.getElementById('equipamiento').value;

if (nombre_teatro === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (nombre_sala === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (telefono === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (localidad === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (codigo_postal === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (direccion === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (email === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (tipo_sala === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}
if (aforo === '') {
    alert('El campo es obligatorio.');
    event.preventDefault(); // Detiene el envío
}

})

document.getElementById('telefono').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
})
document.getElementById('codigo_postal').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-5]/g, '');
})