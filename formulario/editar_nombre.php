<?php
require_once 'log.php';
session_start();

// Verificamos si existe la información del usuario en la sesión
if (isset($_SESSION['correo']) && isset($_SESSION['nombres']) && isset($_SESSION['usuario'])) {
    // Mostramos los datos del usuario almacenados en la sesión
    ?>
    <p>Tu actual nombre de usuario es: <?php echo $_SESSION['usuario']; ?></p>
    <?php

    // Procesar el formulario para editar el nombre de usuario
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obtener el nuevo nombre de usuario desde el formulario
        $nuevoUsuario = $_POST['nuevo_usuario'];

        // Actualizar el nombre de usuario en la base de datos
        
        $idUsuario = $_SESSION['Id']; 

        // Consulta preparada para evitar inyección de SQL
        $consulta = "UPDATE formulario SET usuario = ? WHERE Id = ?";

        $stmt = $conn->prepare($consulta);
        $stmt->bind_param("si", $nuevoUsuario, $idUsuario);

        if ($stmt->execute()) {
            // Actualización exitosa, actualizamos la variable de sesión también
            $_SESSION['usuario'] = $nuevoUsuario;
            echo "Nombre de usuario actualizado correctamente.";
            header("Location: plantilla.php");
            exit();
        } else {
            echo "Error al actualizar el nombre de usuario: " . $stmt->error;
        }
    }
} else {
    // Si no hay información del usuario en la sesión, mostrar un mensaje de error o redirigir a otra página.
    echo "Error: No se encontró la información del usuario en la sesión.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Nombre de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Editar Nombre de Usuario</h1>

    <!-- Formulario para editar el nombre de usuario -->
    <form action="editar_nombre.php" method="post">
        <label for="nuevo-usuario">Nuevo nombre de usuario:</label>
        <input type="text" id="nuevo-usuario" name="nuevo_usuario" required>
        <input type="submit" value="Guardar">   <br><br>
        <input type="button" value="Cancelar" onclick="location.href='plantilla.php';"> 
        
    </form>
</body>
</html>