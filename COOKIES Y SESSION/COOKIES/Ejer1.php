<?php

if (isset($_COOKIE['visitas'])) {
    
    $visitas = $_COOKIE['visitas'] + 1;
} else {
    
    $visitas = 1;
}


setcookie('visitas', $visitas, time() + 365 * 24 * 60 * 60);


if (isset($_POST['reset'])) {
    setcookie('visitas', '', time() - 3600); 
    header("Refresh:0"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas (Cookies)</title>
</head>
<body>
    <h1>
        <?php
        if ($visitas == 1) {
            echo "¡Bienvenido! Esta es tu primera visita.";
        } else {
            echo "Has visitado esta página $visitas veces.";
        }
        ?>
    </h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <button type="submit" name="reset">Reiniciar Contador</button>
    </form>
</body>
</html>
