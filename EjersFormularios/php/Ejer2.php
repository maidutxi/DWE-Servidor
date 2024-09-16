<?php
   
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $numaleatorio=rand(1,5);
        if(htmlspecialchars($_GET["numero"])==$numaleatorio){
            echo "Has acertado";
        }
        else{
            echo ("No has acertado, el número era ".$numaleatorio);
        }
    }

?>
