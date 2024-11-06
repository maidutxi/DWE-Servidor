<?php

        
        session_start();
        if (!isset($_SESSION["nombre"])) {
            header("Location: login.php");
            exit();
        }
        
        // Conexión a la base de datos
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        $usuario = $_SESSION["nombre"];

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $issan = $_POST["issan"];
            $año = $_POST["año"];
            $puntuacion = $_POST["puntuacion"];

            $sql = "SELECT * FROM Peliculas WHERE ISSAN = '$issan'";
            $result = $conn->query($sql);

            // Insertar película
            if ($result->num_rows == 0 && strlen($issan) == 8 && !empty($nombre)) {
                $insert = "INSERT INTO Peliculas (usuario, nombrepel, ISSAN, año, puntuacion) 
                            VALUES ('$usuario', '$nombre', '$issan', '$año', '$puntuacion')";
                if ($conn->query($insert) === TRUE) {
                    echo "Película añadida correctamente.";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
            // Actualizar película
            elseif ($result->num_rows > 0 && !empty($nombre)) {
                $update = "UPDATE Peliculas SET nombrepel = '$nombre', puntuacion = '$puntuacion', año = '$año' WHERE ISSAN = '$issan' AND usuario = '$usuario'";
                if ($conn->query($update) === TRUE) {
                    echo "Película actualizada correctamente.";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
            // Eliminar película
            elseif ($result->num_rows > 0 && empty($nombre) && empty($año)) {
                $delete = "DELETE FROM Peliculas WHERE ISSAN = '$issan' AND usuario = '$usuario'";
                if ($conn->query($delete) === TRUE) {
                    echo "Película eliminada.";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }

        // Mostrar películas del usuario
        $sql = "SELECT * FROM Peliculas WHERE usuario = '$usuario'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Películas en tu colección:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Nombre</th>
                        <th>ISAN</th>
                        <th>Año</th>
                        <th>Puntuación</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["nombrepel"]) . "</td>
                        <td>" . htmlspecialchars($row["ISSAN"]) . "</td>
                        <td>" . htmlspecialchars($row["año"]) . "</td>
                        <td>" . htmlspecialchars($row["puntuacion"]) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No tienes películas en tu colección.";
        }

        $conn->close();
    ?>