<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Conexión
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    echo "Conexión exitosa<br>";

    // Crear tablas
    $clientes = "CREATE TABLE IF NOT EXISTS Clientes(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(40) NOT NULL UNIQUE,
        contraseña VARCHAR(20) NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $pelis = "CREATE TABLE IF NOT EXISTS Peliculas(
        usuario VARCHAR(40),
        nombrepel VARCHAR(160) NOT NULL,
        ISSAN INT(8) NOT NULL UNIQUE,
        año YEAR,
        puntuacion TINYINT CHECK (puntuacion BETWEEN 0 AND 5),
        PRIMARY KEY (usuario, ISSAN),
        FOREIGN KEY (usuario) REFERENCES Clientes(nombre)
    )";

    if ($conn->query($clientes) === TRUE) {
        echo "Tabla Clientes creada correctamente o ya existe.<br>";
    } else {
        echo "Error al crear la tabla Clientes: " . $conn->error . "<br>";
    }

    if ($conn->query($pelis) === TRUE) {
        echo "Tabla Peliculas creada correctamente o ya existe.<br>";
    } else {
        echo "Error al crear la tabla Peliculas: " . $conn->error . "<br>";
    }

    
    if (!empty($_POST["nombre"]) && !empty($_POST["contraseña"]) && !empty($_POST["contraseña2"])) {
        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $contraseña2 = $_POST["contraseña2"];

        
        if ($contraseña === $contraseña2) {
            // Insertar el usuario registrado
            $sql = "INSERT INTO Clientes (nombre, contraseña) VALUES ('$nombre', '$contraseña')";

            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro creado con éxito<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
            }
        } else {
            echo "Las contraseñas no coinciden.<br>";
        }
    } else {
        echo "Por favor, completa todos los campos.<br>";
    }

    $conn->close();
}
?>
