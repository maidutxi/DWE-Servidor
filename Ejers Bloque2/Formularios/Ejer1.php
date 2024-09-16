<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nombre=htmlspecialchars($_POST["Nombre"]);

        echo "Hola " . $nombre . "! <br>";
    }
    else{
        echo "No se han enviado datos";
    }


?>