<?php
session_start();

$usuario="";
$contraseña="";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["usuario"]) && isset($_POST["contraseña"])){
            $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];

        if($usuario=="admin" && $contraseña=="1234"){
            if(isset($_POST["comprobar"])){ //no hace falta comprobar si se le ha dado al boton porque con el usuario y la contyraseña ya se indica que se ha enviado el formulario
                $_SESSION["usuario"]=$usuario; //guardamos el usuario en la sesión
                header("Location: bienvenido.php");
                exit(); 
                
            }
            
        }
        else{
            echo ("El usuario y o contraseña no es correcto.");
        }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer2</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Usuario:</label><br><input type="text" name="usuario" required value="<?php echo $usuario;?>"> <br>
        <label>Contraseña:</label><br><input type="password" name="contraseña" required value="<?php echo $contraseña; ?>"><br>
        <input type="submit" name="comprobar" value="Iniciar Sesión">
    </form>
    <a href="variablesSesion.php">Ir a variables Sesión</a>
</body>
</html>