<?php
require_once 'log.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['Id'])) {
        $idUsuario = $_SESSION['Id'];

        // Consulta para eliminar el registro de la cuenta
        $consulta = "DELETE FROM formulario WHERE Id = $idUsuario";

        if ($conn->query($consulta) === TRUE) {
            // Eliminación exitosa, redirigir a la página de inicio.
            session_destroy(); // Eliminamos también la sesión para cerrar la sesión del usuario después de eliminar su cuenta.
            header("Location: index.html");
            exit();
        } else {
            echo "Error al eliminar la cuenta: " . $conn->error;
        }
    } else {
        // Si el usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error.
        header("Location: login.html");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Cuenta</title>
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

        p {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }

        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>Eliminar Cuenta</h1>

    <!-- Resto del código HTML sigue igual -->

    <!-- Formulario para eliminar la cuenta -->
    <form action="eliminar_cuenta.php" method="post">
        <p>¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.</p>
        <input type="submit" value="Eliminar"><br><br>
        <input type="button" value="Cancelar" onclick="location.href='plantilla.php';"> <br><br>
    </form>
</body>
</html>