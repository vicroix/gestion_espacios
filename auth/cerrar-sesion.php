<?php
session_start();
session_destroy(); // Destruye la sesión
header("refresh:1;url=../index.php");; // Redirige a la página principal
exit();
?>