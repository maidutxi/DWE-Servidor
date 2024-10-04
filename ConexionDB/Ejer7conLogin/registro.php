<?php
session_start(); 

$nombreErr = "";
$emailErr = "";
$contraseñaErr = "";

// Función para limpiar la entrada de datos
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $email = test_input($_POST["email"]);
    $contraseña = test_input($_POST["contraseña"]);
    $contraseña2 = test_input($_POST["contraseña2"]);

    
    if (empty($nombre)) {
        $_SESSION['nombreErr'] = "El nombre es obligatorio";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $_SESSION['nombreErr'] = "El nombre solo permite mayúsculas, minúsculas y espacios";
    } else {
        $_SESSION['nombreErr'] = ""; 
    }

    
    if (empty($email)) {
        $_SESSION['emailErr'] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErr'] = "El formato del correo no es válido";
    } else {
        $_SESSION['emailErr'] = ""; 
    }

    
    $requisitosContraseña = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#?!])[A-Za-z\d@#?!]{6,}$/";
    if (empty($contraseña)) {
        $_SESSION['contraseñaErr'] = "La contraseña es obligatoria";
    } elseif (!preg_match($requisitosContraseña, $contraseña)) {
        $_SESSION['contraseñaErr'] = "La contraseña debe tener al menos 6 caracteres, una mayúscula, una minúscula, un número y un símbolo.";
    } elseif ($contraseña != $contraseña2) {
        $_SESSION['contraseñaErr'] = "Las contraseñas no coinciden.";
    } else {
        $_SESSION['contraseñaErr'] = ""; 
    }

    
    if (empty($_SESSION['nombreErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['contraseñaErr'])) {

        // Conexión 
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        $sql = "CREATE TABLE IF NOT EXISTS Usuario (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL UNIQUE,
            contraseña VARCHAR(255) NOT NULL,
            fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        
        $conn->query($sql);

        
        $sql = "SELECT * FROM Usuario WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['emailErr'] = "Ya existe una cuenta con este correo electrónico.";
        } else {
            
            $sql = "INSERT INTO Usuario (nombre, email, contraseña)
                    VALUES ('$nombre', '$email', '$contraseña')"; 

            if ($conn->query($sql) === TRUE) {
                
                unset($_SESSION['nombreErr']);
                unset($_SESSION['emailErr']);
                unset($_SESSION['contraseñaErr']);
            } else {
                
                $_SESSION['error'] = "Error al insertar datos: " . $conn->error;
            }
        }

        $conn->close();
    }

    
    header("Location: RegistroLogin.php");
    exit();
}
?>
