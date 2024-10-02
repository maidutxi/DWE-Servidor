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
            
            echo "Hola "  . htmlspecialchars($_SESSION["nombre"]);
            if(isset($_POST["Logout"])){
                session_unset();
                session_destroy();
                header("Location:RegistroLogin.php");
                
            }
        ?>
        
    </h1>
    
    <form method="post"action="RegistroLogin.php">
    <input type="submit" value="Logout">
    </form>
    
</body>
</html>