<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de inicio</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
//archivo plantilla.php
require_once 'log.php';
session_start();

// Verificamos si existe la información del usuario en la sesión
if (isset($_SESSION['nombres']) && isset($_SESSION['apellidos'])
    && isset($_SESSION['usuario']) && isset($_SESSION['ruta_imagen']) ) {
    // Mostramos los datos del usuario almacenados en la sesión
    ?>
    <h1>Bienvenido estimado: <?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?></h1>
    <h2>Nombre de usuario: <?php echo $_SESSION['usuario']; ?></h2>

    <?php
    // Establecer la ruta de la imagen predeterminada
    $rutaImagenPredeterminada = "img/avatar.jpg";

    // Obtener la ruta de la imagen de la sesión
    $rutaImagen = $_SESSION['ruta_imagen'];

    // Verificar si no hay una ruta de imagen en la sesión, asignar la ruta predeterminada
    if (empty($rutaImagen)) {
        $rutaImagen = $rutaImagenPredeterminada;
    }
    ?>

    <!-- Mostrar la imagen de perfil del usuario -->
    <img src="<?php echo $rutaImagen; ?>" alt="Imagen de perfil"><br><br>

<?php
} else {
    // Si no hay información del usuario en la sesión, mostrar un mensaje de error o redirigir a otra página.
    echo "Error: No se encontró la información del usuario en la sesión.";
}
?>

<!-- Enlaces para editar nombre de usuario, cambiar foto de perfil y eliminar cuenta -->
<a href="editar_nombre.php">Editar nombre de usuario</a> <br><br>
<a href="cambiar_foto.php">Cambiar foto de perfil</a><br><br>
<a href="eliminar_cuenta.php">Eliminar cuenta</a><br><br>

<form action="cerrar_sesion.php" method="post">
    <input type="submit" value="Cerrar sesión">
</form>    
</body>
</html>