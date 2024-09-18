<?php
    if($_SERVER ["REQUEST_METHOD"]=="POST"){
        if(empty ($_POST ["nombre"])){
            $nombreErr="Se requiere el nombre";
        }else{
            $nombre=htmlspecialchars($_POST["nombre"]);
            $nombre=stripslashes($nombre);
            $nombre=trim($nombre);
        }

        if(empty($_POST["email"])){
            $emailErr="El correo es requerido";
        }
        else{
            $email=trim($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr="El formato del correo no es válido"
            }

        }

        
    }

?>