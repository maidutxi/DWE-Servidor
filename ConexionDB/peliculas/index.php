<?php
session_start();
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
        echo("Bienvenido". $_SESSION["nombre"]);
    ?>

    <h2>TUS PELÍCULAS</h2>


    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre: </label><br>
        <input type="text" name="nombre" required><span style="color:red;"><?php echo $nombreErr ?></span><br><br>

        <label>ISAN: </label><br>
        <input type="text" name="issan" required><span style="color:red;"><?php echo $ISSANErr ?></span><br><br>

        <label>Año: </label><br>
        <input type="number"  name="año" min="1900" max="2024" required><br>

        <select id="puntuacion" name="puntuacion">
            <option value="">Selecciona una puntuación</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <input type="submit" value="Enviar" name="enviar">
    </form>


    <?php
        if($_SESSION["REQUEST_METHOD"]=="POST"){
            
            //Conexion
            $servername="db";
            $username="root";
            $password="root";
            $dbname="mydatabase";

            $conn=new mysqli($servername,$username,$password,$dbname);

            if($conn->connect_error){
                die("Conexión fallida: ". $conn->connect_error);
            }
            
            echo "Conexión exitosa";
            
            if(empty($_POST["nombre"])&& empty($_POST["isan"])){
                $nombreErr= echo "El nombre de la película no puede estar vacío";
                $ISANErr= echo "El Isan se la pelúcla no puede estar vacío";
            }

            $sql="SELECT * FROM Peliculas WHERE ISSAN= '" . $_POST["issan"] "'";
            $result=$conn->query($sql);

            if(($result->num_rows==0) && strlen($_POST["issan"]==8) && isset($_POST["nombre"]) && isset($_POST["issan"]) && isset($_POST["año"]) && isset($_POST["puntuacion"])){

                $peli="INSERT INTO Peliculas (nombrepel, ISSAN, año, punmtuacion) 
                VALUES ('$_POST["nombrepel"]', '$_POST["issan"]', '$_POST["año"]', '$_POST["puntuacion"]'";
            }
            else if ($result->num_rows==0){
                echo "Ya has visto esta película y la has puntuado";
            }
            else if(($result->num_rows>0) && isset($_POST["nombre"]) && isset($_POST["issan"]) && isset($_POST["año"]) && isset($_POST["puntuacion"])){
                
                $actualizarpeli = "UPDATE peliculasUsuario SET nombrepel = '" . $_POST['nombre'] . "', puntuacion = '" . $_POST['puntuacion'] . "' WHERE ISSAN = '" . $_POST['issan'] . "'";
            }
            else if(($result->num_rows>0) && empty($_POST["nombre"])){
                $eliminarpeli = "DELETE FROM peliculasUsuario WHERE ISAN = '" . $_POST["issan"] . "'";

            }

                


        }
    ?>
    
</body>
</html>