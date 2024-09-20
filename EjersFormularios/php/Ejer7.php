<?php
    if($_SERVER ["REQUEST_METHOD"]=="POST"){
        $nombre=trim($_POST["nombre"]);
        $email=trim($_POST["email"]);
        $contraseña=($_POST["contraseña"]);
        $contraeña2=($_POST["contraseña2"]);




        

        
        if(empty ($nombre) || empty ($email) || empty ($contraseña) || empty ($contraeña2)){
            echo "Todos los campos son obligatorios";
        }
        

        if(!preg_match ("/^[a-zA-Z\s]+$/", $nombre)){
            echo "El nombre solo permite mayúsculas, minúsculas y espacios";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr="El formato del correo no es válido"
        }

        $requisitosContraseña="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#?!])[A-Za-z\d@#?!]{6,}$/";

        if(!preg_match($requisitosContraseña,$contraseña)){
            echo "La contraseña tiene que tener al menos 6 caracteres,  una letra mayúscula, una letra minúscula, un número y  un símbolo;
        }
         
        if($contraseña!=$contraeña2){
            echo "Las contraseñas tienen que ser iguales";
        }
        
        else{
        echo "Registro completado";
        }


        
    }

?>
