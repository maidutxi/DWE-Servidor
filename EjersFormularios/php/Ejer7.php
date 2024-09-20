<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer7</title>
</head>
<body>

<?php
$nombreErr = "";
$emailErr = "";
$contraseñaErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nombre"])) {
        $nombreErr = "El nombre es obligatorio";
    } else {
        $nombre = test_input($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
            $nombreErr = "El nombre solo permite mayúsculas, minúsculas y espacios";
        }
    }

    
    if (empty($_POST["email"])) {
        $emailErr = "El email es obligatorio";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "El formato del correo no es válido";
        }
    }

    
    $contraseña = test_input($_POST["contraseña"]);
    $contraseña2 = test_input($_POST["contraseña2"]);
    $requisitosContraseña = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#?!])[A-Za-z\d@#?!]{6,}$/";

    if (!preg_match($requisitosContraseña, $contraseña)) {
        $contraseñaErr = "La contraseña tiene que tener al menos 6 caracteres, una letra mayúscula, una letra minúscula, un número y un símbolo.";
    }

    if ($contraseña != $contraseña2) {
        $contraseñaErr = "Las contraseñas tienen que ser iguales.";
    } else {
        echo "Registro completado.";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Nombre:</label><input type="text" name="nombre">
    <span style="color:red;"><?php echo $nombreErr; ?></span>
    <br>
    <label>Correo Electrónico:</label><input type="text" name="email" value="<?php">
    <span style="color:red;"><?php echo $emailErr; ?></span>
    <br>
    <label>Contraseña:</label><input type="password" name="contraseña">
    <span style="color:red;"><?php echo $contraseñaErr; ?></span>
    <br>
    <label>Confirmar Contraseña:</label><input type="password" name="contraseña2">
    <input type="submit" value="Enviar">
</form>

</body>
</html>
