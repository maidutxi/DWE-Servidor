<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (isset($_POST["numero1"])) {
            $numero1 = (float)$_POST["numero1"];
        } else {
            $numero1 = 0;
        }
        
        if(isset($_POST["numero2"])){
            $numero2=(float)$_POST["numero2"];
        }
        else{
            $numero2=0;
        }
        $suma=$numero1 + $numero2;

        echo "La suma de " . htmlspecialchars($numero1) . " y " . htmlspecialchars($numero2) . " es " . htmlspecialchars($suma);
    }
    else{
        echo "No se han enviado datos.";
    }

?>