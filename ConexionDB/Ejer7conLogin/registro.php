<?php
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
        $nombre=$_POST["nombre"];
        $email=$_POST["email"];
        $contraseña=$_POST["contraseña"];
        $contraseña2=$_POST["contraseña2"];
        
        
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
    }

    
    //Conexion
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa";

    //crear tabla
    $sql = "CREATE TABLE IF NOT EXISTS Usuario (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        contraseña VARCHAR(255) NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";


    if ($conn->query($sql) === TRUE) {
        echo "Tabla Usuario creada correctamente (o ya existe).";
    } else {
        echo "Error al crear la tabla: " . $conn->error;
    }

    //insertar datos usuario
    $sql = "INSERT INTO Usuario (nombre, email, contraseña)
    VALUES ('$nombre', '$email', '$contraseña')";


    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();


    
?>