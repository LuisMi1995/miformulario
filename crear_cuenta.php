<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Crear cuenta</title>
  <link rel="stylesheet" href="crear_cuenta.css">
</head>
<body>
  <div class="create-account-container">
    <h2>Crear cuenta</h2>
    <form method="POST" action="crear_form.php">
      <label for="nombres">Nombres:</label>
      <input type="text" id="nombres" name="nombres" required><br><br>
      
      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="apellidos" required><br><br>
      
      <label for="correo">Correo electrónico:</label>
      <input type="email" id="correo" name="correo" required><br><br>
      
      <label for="contrasena">Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" required><br><br>

      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="usuario"><br><br>

      
      
            
      <input type="submit" value="Crear cuenta" class="create-account-button">

    </form>
    
  </div>
</body>
</html>