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
    $requisitosContraseña = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#?!])[A-Za-z\d@#?!]{6,}$/" ;

    if (!preg_match($requisitosContraseña, $contraseña)) {
        $contraseñaErr = "La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula, un número y un símbolo.";
    } elseif ($contraseña != $contraseña2) {
        $contraseñaErr = "Las contraseñas no coinciden.";
    } 

    
    if (empty($nombreErr) && empty($emailErr) && empty($contraseñaErr)) {
        header("Location: conexion.php");
        exit();
    }
}

// Función para limpiar la entrada de datos
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



$servername = "db";
$username = "root";
$password = "root";
$dbname = "mydatabase";


$conn = new mysqli($servername, $username, $password, $dbname);

/
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "INSERT INTO MyGuests (nombre, email, contraseña)
VALUES ($nombre, $email, $contraseña)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
