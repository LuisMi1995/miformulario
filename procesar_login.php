<?php
// Incluir el archivo de conexión
require_once 'log.php';
session_start();

// Definir una variable para almacenar un mensaje de alerta
$alertMessage = '';

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["correo"];
    $password = $_POST["contrasena"];

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM formulario WHERE correo='$username'";
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontró un correo
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row["contrasena"];

       // Verificar la contraseña
if ($password == $storedPassword) {
    // Inicio de sesión exitoso, guardar los datos del usuario en la sesión
    $_SESSION["Id"] = $row["Id"];
    $_SESSION["nombres"] = $row["nombres"];
    $_SESSION["apellidos"] = $row["apellidos"];
    $_SESSION["correo"] = $username;
    $_SESSION["usuario"] = $row["usuario"];

    // Verificar si existe la columna ruta_imagen en el resultado de la consulta
    if (isset($row["ruta_imagen"])) {
        $_SESSION["ruta_imagen"] = $row["ruta_imagen"];
    } else {
        // Si no existe, asignar la ruta predeterminada
        $_SESSION["ruta_imagen"] = "img/avatar.jpg";
    }

    // Redirigir a la página personalizada
    header("Location: plantilla.php");
    exit();
}
    }

    // Credenciales incorrectas, asignar el mensaje de alerta
    $alertMessage = 'Correo electrónico o contraseña incorrectos. Inténtalo de nuevo.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de inicio de sesión</title>
    <link rel="stylesheet" href="estilos.css">
    <script>
        // Función para mostrar la alerta si hay un mensaje
        function mostrarAlerta() {
            <?php if (!empty($alertMessage)) { ?>
            alert('<?php echo $alertMessage; ?>');
            <?php } ?>
        }
    </script>
</head>
<body onload="mostrarAlerta()">
    
<div class="login-container">
    <h1>Inicia sesión</h1>
    <form method="POST" action="">
        <label for="correo">Correo electrónico:</label>
        <input type="text" id="correo" name="correo" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>

        <div class="button-container">
            <input type="submit" value="Iniciar sesión" class="login-button">
            <input type="button" value="Crear cuenta" class="create-account-button" onclick="window.location.href='crear_cuenta.php'">
        </div>
    </form>
</div>

</body>
</html>