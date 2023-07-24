<?php
//archivo log.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "credenciales";

// Crear una conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>