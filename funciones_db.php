<?php
// Función para obtener la información del usuario desde la base de datos
function obtenerInformacionUsuario($correo) {
  
  $conexion = new mysqli("localhost", "root", "", "credenciales");
  if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
  }

  $correo = $conexion->real_escape_string($correo);
  $consulta = "SELECT usuario, nombres, apellidos, imagen FROM formulario WHERE correo = '$correo'";
  $resultado = $conexion->query($consulta);

  if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    return $fila; // Devuelve un array asociativo con los datos del usuario
  }

  return false; // Devuelve false si no se encuentra el usuario en la base de datos
}
?>