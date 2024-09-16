<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=htmlspecialchars($_POST ["email"]);
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "La dirección de correo electrónico " . htmlspecialchars($email) . " es válida.";
        } else {
            echo "La dirección de correo electrónico " . htmlspecialchars($email) . " no es válida.";
        }
    } else {
        echo "No se han enviado datos.";
    }
?>