<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar Sesión</title>
</head>
<body>
    <h2>Comprobación de Sesión</h2>
    <?php
    if (isset($_SESSION["usuario"])) {
        echo "La sesión está activa. Usuario: " . htmlspecialchars($_SESSION["usuario"]);
    } else {
        echo "No hay una sesión activa.";
    }
    ?>
    
</body>
</html>
