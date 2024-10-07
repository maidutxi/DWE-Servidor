<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $servername="db";
        $username="root";
        $password="root";
        $dbname="mydatabse";

        $conn=new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){
            die("Conexión fallida" . $conn->connect_error);
        }
        echo("Conexión exitosa");


        //crear tablas
        $clientes="CREATE TABLE IF NOT EXISTS Clientes(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR (40) NOT NULL UNIQUE,
        contraseña VARCHAR (20) NOT NULL,
        fecha_registro TIMESTAMP DEFAULT CURENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

        )";

        $pelis="CREATE TABLE IF NOT EXISTS Peliculas(
        usuarioVRACHAR (50),
        nombrepel VARCHAR (160) NOT NULL,
        ISSAN INT (8) NOT NULL UNIQUE,
        año YEAR,
        puntuacion TINYINT CHECK (puntuacion BETWEEN 0 AND 5),
        
        PRIMARY KEY (usuario, ISSAN),
        FOREIGN KEY (usuario) REFERENCES usuarios(nombre)
        )";

        if ($conn->quey($clientes)==TRUE){
            echo "Tabla Clientes creada correctamente o ya existe.";
        }
        else{
            echo "Error al crear la tabla Clientes";
        }

        if ($conn->quey($pelis)==TRUE){
            echo "Tabla Peliculas creada correctamente o ya existe.";
        }
        else{
            echo "Error al crear la tabla Peliculas";
        }

        $sql="INSERT INTO Clientes (nombre, contraseña)
        VALUES ('$nombre', '$contraseña')";

        if($conn->query($sql)==TRUE){
            echo "Nuevo registro creado con éxito";
        }
        else{
            echo "Error: ".$sql. "<br>" . $conn->error;
        }

        $conn->close();

    }

?>