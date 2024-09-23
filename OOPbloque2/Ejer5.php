<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer4 OOP</title>
</head>
<body>
    <?php

    class Valoracion {
        private $nombre="";
        private $valoracion="";
        private $comentario="";
        

        function __construct($nombre, $valoracion, $comentario) {
            $this->nombre = $nombre;
            $this->valoracion = $valoracion;
            $this->comentario = $comentario;
            
        }

        function get_nombre() {
            return $this->nombre;
        }

        function get_valoracion() {
            return $this->valoracion;
        }

        function get_comentario() {
            return $this->comentario;
        }

        
    }
    $nombre="";
    $valoracion="";
    $comentario="";
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formulario = new Valoracion($_POST["nombre"], $_POST["valoracion"], $_POST["comentario"]);
        echo("Nombre: ". $formulario->get_nombre()."<br> Valoración: ".$formulario->get_valoracion()."<br>Comentario: ".$formulario->get_comentario());

        
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Nombre:</label><input type="text" name="nombre" required value="<?php echo $nombre;?>"> <br>
        <label for="valoracion">Valoración (1-5):</label><br>
        <select name="valoracion">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br> 


        <label>Comentario:</label>
        <textarea name="comentario" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="enviar">
    </form>

</body>
</html>
