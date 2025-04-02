<?php
//Para conectarse a la bd
include_once("config.php");

// Recojo los datos del formulario
$usuarioNuevo = $_POST['Usuario'];
$ContrasenaNueva = password_hash($_POST['password'], PASSWORD_DEFAULT);
$emailNuevo = $_POST['email'];
$NombreNuevo = $_POST['nombre'];
$ApellidosNuevo = $_POST['apellidos'];
$telefonoNuevo = $_POST['telefono'];

$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, email, nombre, apellidos, telefono) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt) {
    //"sss" significa que se va a vincular 3 parámetros de tipo string
    $stmt->bind_param("sssssi", $usuarioNuevo, $ContrasenaNueva, $emailNuevo, $NombreNuevo, $ApellidosNuevo, $telefonoNuevo);

    // Ejecuta la consulta y envia la sentencia SQL
    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $mysqli->error;
}

// Cierro la conexión para redirigir a login
$mysqli->close();
header("refresh:2;url=../html/formregistro.html");
?>