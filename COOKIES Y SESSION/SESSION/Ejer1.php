<?php
    session_start();
    if (isset($_SESSION["visitas"])){
        $_SESSION["visitas"]=$_SESSION["visitas"]+1;
    }
    else{
        $_SESSION["visitas"]=1;
    }

    if(isset($_POST["reset"])){
        session_unset();
        session_destroy();
        header("Refresh:0");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador visitas Sesion</title>
</head>
<body>
    <h1>
        <?php
            if($_SESSION["visitas"]==1){
                echo ("¡Bienvenido! Esta es tu 1º visita");
            }
            else{
                echo ("Has visitado esta página". $_SESSION["visitas"]. " veces");
            }
        ?>
    </h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="reset" value="Reiniciar Contador">
    </form>
    
</body>
</html>