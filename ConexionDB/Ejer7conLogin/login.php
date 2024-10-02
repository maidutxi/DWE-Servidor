<?php
    session_start();

    //Conexion
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa";

    //Comprobar datos login
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["emailL"]) && isset($_POST["contraseñaL"])){
            
            $nombre = "SELECT nombre FROM Usuario WHERE email = '" . $_POST["emailL"] 
            . "' AND contraseña = '" . $_POST["contraseñaL"] . "'";


            $_SESSION["nombre"]=$nombre;
            header("Location: bienvenido.php");
            exit();
        }
        else{
            echo ("El usuario y o contraseña no es correcto.");
        }

        
    }

    

?>