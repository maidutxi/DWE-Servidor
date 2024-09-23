<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer4 OOP</title>
</head>
<body>
    <?php

    class Registro {
        private $nombre="";
        private $apellido="";
        private $email="";
        private $telefono="";

        function __construct($nombre, $apellido, $email, $telefono) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->telefono = $telefono;
        }

        function get_nombre() {
            return $this->nombre;
        }

        function get_email() {
            return $this->email;
        }

        function get_apellido() {
            return $this->apellido;
        }

        function get_telefono() {
            return $this->telefono;
        }
    }
    $nombre="";
    $apellido="";
    $email="";
    $telefono="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $contacto = new Registro($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["telefono"]);
        echo("Nombre: ". $contacto->get_nombre()."<br> Apellido: ".$contacto->get_apellido()."<br>Email: ".$contacto->get_email(). "<br>Teléfono: ".$contacto->get_telefono());

        
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Nombre :</label><input type="text" name="nombre" required value="<?php echo $nombre;?>">
        <br>
        <label>Apellido:</label><input type="text" name="apellido" required value="<?php echo $apellido;?>">
        <br>
        <label>Correo Electrónico:</label><input type="email" name="email" required value="<?php echo $email;?>">
        <br>
        
        <label> Teléfono:</label><input type="tel" name="telefono" required value="<?php echo $telefono;?>">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
