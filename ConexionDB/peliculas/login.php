<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $servername="db";
        $username="root";
        $password="root";
        $dbname="prueba";

        $conn=new mysqli($servername,$username,$password,$dbname);

        if($conn-> connect_error){
            die("Conexión fallida: " .$conn->connect_error);
        }
        //echo "Conexión exitosa";

        if(isset($_POST["nombre"]) && isset($_POST["contraseña"])){
            $nombre = "SELECT nombre from Clientes WHERE nombre= '" .$_POST["nombre"]. 
            "'AND contraseña= '" . $_POST["contraseña"]. "'"; 


            $result=$conn->query($nombre);

            if($result ->num_rows>0){
                while($rownombre=$result->fetch_assoc()){
                    $_SESSION["nombre"]=$rownombre["nombre"];
                }
                header("Location: index.php");
                exit();
            }
            else{
                echo "No existe ningún usuario así";
            }

        }
        else{
            echo "El usuario y/o contraseña no es correcto";
        }
    }
    $conn->close();
?>
