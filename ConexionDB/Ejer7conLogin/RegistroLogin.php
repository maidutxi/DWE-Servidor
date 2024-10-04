<?php
session_start(); // Iniciar la sesión
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Login</title>
</head>
<body>
<h2>Registro</h2>
<form method="post" action="registro.php">
    <label>Nombre:</label><br>
    <input type="text" name="nombre">
    <span style="color:red;"><?php echo isset($_SESSION['nombreErr']) ? $_SESSION['nombreErr'] : ''; ?></span>
    <br><br>

    <label>Correo Electrónico:</label><br>
    <input type="text" name="email">
    <span style="color:red;"><?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ''; ?></span>
    <br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="contraseña">
    <span style="color:red;"><?php echo isset($_SESSION['contraseñaErr']) ? $_SESSION['contraseñaErr'] : ''; ?></span>
    <br><br>

    <label>Confirmar Contraseña:</label><br>
    <input type="password" name="contraseña2">
    <br><br>

    <input type="submit" value="Enviar">
</form>

<h2>Login</h2>
<form action="login.php" method="post">
    <label>Email:</label><br>
    <input type="text" name="emailL"> <br><br>
    <label>Contraseña:</label><br>
    <input type="password" name="contraseñaL"><br><br>

    <input type="submit" value="Entrar">
</form>

</body>
</html>
