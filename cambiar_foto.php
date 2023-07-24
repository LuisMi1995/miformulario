<?php
require_once 'log.php';
session_start();

// Verificar si se ha iniciado una sesión y el usuario está autenticado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se envió la imagen
    if (isset($_FILES["nueva_foto"])) {
        $nombreArchivo = $_FILES["nueva_foto"]["name"];
        $archivoTemporal = $_FILES["nueva_foto"]["tmp_name"];
        $rutaGuardado = "img/" . $nombreArchivo; // Cambia "ruta/del/servidor/" por la ruta donde quieres guardar la imagen en tu servidor

        // Mover el archivo temporal al directorio de destino
        if (move_uploaded_file($archivoTemporal, $rutaGuardado)) {
            // La imagen se ha cargado y guardado correctamente
            echo "La imagen se ha cargado y guardado correctamente.";

            // Obtener el nombre de usuario desde la sesión
            $username = $_SESSION['correo'];

            // Actualizar la URL de la imagen en la base de datos 
            $sql = "UPDATE formulario SET ruta_imagen = '$rutaGuardado' WHERE correo = '$username'";
            if (mysqli_query($conn, $sql)) {
                // Actualizar la ruta de la imagen en la sesión
                $_SESSION['ruta_imagen'] = $rutaGuardado;
                header("Location: plantilla.php");
                exit();
            } else {
                // Si hay un error en la consulta, muestra el mensaje de error
                echo "Error al actualizar la ruta de la imagen: " . mysqli_error($conn);
            }
        } else {
            echo "Error al cargar la imagen.";
        }
    } else {
        echo "No se seleccionó ninguna imagen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambiar Foto de Perfil</title>
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

        input[type="file"] {
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
    <h1>Cambiar Foto de Perfil</h1>

    <!-- Formulario para cambiar la foto de perfil -->
    <form action="cambiar_foto.php" method="post" enctype="multipart/form-data">
        <label for="nueva-foto">Seleccione una nueva foto de perfil:</label>
        <input type="file" id="nueva-foto" name="nueva_foto" accept="image/*" required>
        <input type="button" value="Cancelar" onclick="location.href='plantilla.php';"> <br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>