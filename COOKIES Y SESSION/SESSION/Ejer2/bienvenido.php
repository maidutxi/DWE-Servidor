<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>
        <?php
            
            echo "Hola "  . htmlspecialchars($_SESSION["usuario"]);
            
        ?>
        
    </h1>
    <a href="variablesSesion.php">Ir a variables Sesión</a>
    
</body>
</html>