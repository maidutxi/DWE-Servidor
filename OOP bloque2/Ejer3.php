<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer3 OOP</title>
</head>
<body>
    <?php

        class Registro {
            private $nombre;
            private $email;
            private $contraseña;
            private $repetirContraseña;


            function __construct($nombre,$email,$contraseña,$repetirContraseña){
                $this ->name=$name;
                $this ->email=$email;
                $this ->contraseña=$contraseña;
                $this ->repetirContraseña=$repetirContraseña;
            }

            function set_name($nombre){
                $this ->nombre= $nombre;
            }

            function set_email($email){
                $this -> email=$email;
            }

            function set_contraseña($contraseña){
                $this ->contraseña=$contraseña;
            }

            function set_contraseña2($repetirContraseña){
                $this ->contraseña2=$repetirContraseña;
            }

            function get_nombre(){
                return $this -> nombre;
            }

            function get_email(){
                return $this -> email;
            }

            function get_contraseña(){
                return $this -> contraseña;
            }

            function get_contraseña2(){
                return $this -> contraseña2;
            }

            

        }
        
        if($_SERVER["REQUEST_METHOD"]== "POST"){
            $usuario = new Registro($_POST["nombre"],$_POST["email"],$_POST["contraseña"], $_POST["contraseña2"]);

            

            if($usuario->get_contraseña==$usuario->get_contraseña2){
                echo $usuario->get_nombre . "<br>" . $usuario ->get_email . " Las contraseñas coinciden."
            }
            else{
                echo $usuario->get_nombre . "<br>" . $usuario ->get_email . " Las contraseñas no coinciden."
            }
            
        }

        
    

    ?>

    <form  method="post" action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]); ?>">
    <label>Nombre de Usuario:</label><input type="text" name="nombre" required>
        <br>
        <label>Correo Electrónico:</label><input type="email" name="email" required>
        <br>
        <label>Contraseña:</label><input type="password" name="contraseña" required>
        <br>
        <label>Repetir Contraseña:</label><input type="password" name="contraseña2" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>