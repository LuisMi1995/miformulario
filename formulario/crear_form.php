<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "credenciales";

// Datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  // Crear una conexión a la base de datos utilizando mysqli
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar si hay errores de conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Construir y ejecutar la consulta SQL para insertar los datos
  $sql = "INSERT INTO formulario (nombres, apellidos, correo, contrasena) VALUES ('$nombres', '$apellidos', '$correo', '$contrasena')";

  if ($conn->query($sql) === TRUE) {
    // Redirigir al archivo login.html
    header("Location: index.html");
    exit; // Asegurarse de que el script se detenga después de la redirección
  } else {
    echo "Error al insertar los datos en la base de datos: " . $conn->error;
  }

  // Cerrar la conexión
  $conn->close();
}
?>