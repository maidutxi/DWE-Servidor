<?php
    $saludo="¡Bienvenido!";
    $background_color= "#FFF";
    $texto="#000";
    
        if(isset($_COOKIE["tema"])){
            if($_COOKIE["tema"]=="oscuro"){
                $background_color= "#000";
                $texto="#FFF";
            }
        }
            

        if(isset($_COOKIE["idioma"])){
            if($_COOKIE["idioma"]=="euskera"){
                $saludo="Ongi Etorri!";
            }
            
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body style="background-color:<?php echo $background_color;?>; color:<?php echo $texto;?>">
    <h1 ><?php echo $saludo;?></h1>
    <form method="post" action="guardar.php">
        <h3>Configuración</h3>
        <fieldset>
            <legend>Tema:</legend>

            
            <label>claro</label><input type="radio" name="tema" value="claro">
            <label>oscuro</label><input type="radio" name="tema" value="oscuro"><br>

        
        </fieldset>
        <fieldset>
            <legend>Idioma</legend>
            
            <label>eus</label><input type="radio" name="idioma" value="euskera">
            <label>esp</label><input type="radio" name="idioma" value="español">
        </fieldset><br>
        <input type="submit" value="Enviar">

    </form>
    
</body>
</html>