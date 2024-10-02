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
    //echo "Conexión exitosa";//

    //Comprobar datos login
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["emailL"]) && isset($_POST["contraseñaL"])){
            
            $nombre = "SELECT nombre FROM Usuario WHERE email = '" . $_POST["emailL"] 
            . "' AND contraseña = '" . $_POST["contraseñaL"] . "'";

            $result = $conn->query($nombre);
            
            if($result->num_rows>0){
                while($rowNombre = $result->fetch_assoc()) { //el result devuelve un objeto con mucha informacion, solo nos interesa el nombre, si quiero guardar mas cosas habra que ir 1 a 1
                    $_SESSION["nombre"]=$rowNombre["nombre"]; //el nombre de rowNombre es la columna de la BD y el del sesion es el que yo le quiera dar
                    
                    //while($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    //}
                }
                header("Location: bienvenido.php");
                
            }
            else{
                echo "No existe";
            }


            
            
        }
        else{
            echo ("El usuario y o contraseña no es correcto.");
        }

        
    }

    

?>