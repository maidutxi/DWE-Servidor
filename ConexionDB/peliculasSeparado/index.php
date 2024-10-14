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

    // Definir la variable $usuario
    $usuario = $_SESSION["nombre"];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
</head>
<body>
    <?php
        echo "Bienvenido, " . $_SESSION["nombre"];
    ?>

    <h2>TUS PELÍCULAS</h2>
    
    <form method="post" action="gestionpeliculas.php">
        <label>Nombre: </label><br>
        <input type="text" name="nombre"><br><br>

        <label>ISAN: </label><br>
        <input type="text" name="issan" required><br><br>

        <label>Año: </label><br>
        <input type="number" name="año" min="1900" max="2024" optional><br>

        <label>Puntuación:</label>
        <select id="puntuacion" name="puntuacion">
            <option value="">Selecciona una puntuación</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php
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
    ?>

    
</body>
</html>
