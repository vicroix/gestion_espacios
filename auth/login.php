<?php
session_start(); // Iniciar sesión al principio

//Conecto a la base de datos
include_once("config.php");

// Recojo los datos del formulario
$email_login = trim($_POST['email']);
$contrasena_login = $_POST['password'];

// Validar que no estén vacíos los campos
if (empty($email_login) || empty($contrasena_login)) {
    echo "Por favor, rellena todos los campos.";
    header("refresh:1;url=../html/iniciosesion.html");
    exit;
}

// Preparo la consulta
$stmt = $mysqli->prepare("SELECT idusuarios, email, password, nombre FROM usuarios WHERE email = ?");
if ($stmt === false) {
    echo "Error al preparar la consulta: " . $mysqli->error;
    exit;
}

$stmt->bind_param("s", $email_login);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificamos si el usuario existe
if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();  // Ahora la variable se llama $usuario, más claro

    if (password_verify($contrasena_login, $usuario['password'])) {
        $_SESSION["id"] = $usuario['idusuarios'];  // Guarda el ID del usuario
        $_SESSION["nombre"] = $usuario['nombre'];  // Guarda el nombre
        $_SESSION["email"] = $usuario['email'];    // Guarda el email
        echo "Autenticación correcta";
        header("refresh:1;url=../index.php");
        exit;
    } else {
        echo "Contraseña incorrecta";
        header("refresh:1;url=../html/iniciosesion.html");
        exit;
    }
} else {
    echo "Correo no registrado";
    header("refresh:1;url=../html/iniciosesion.html");
    exit;
}

// Cierro la conexión
$stmt->close();
$mysqli->close();
?>
