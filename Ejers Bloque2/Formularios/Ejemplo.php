
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST["Nombre"]);
        $email = htmlspecialchars($_POST["Email"]);

        echo "Bienvenido " . $nombre . "<br>";
        echo "Tu dirección de email es: " . $email;
    } else {
        echo "No se han enviado datos.";
    }
    ?>
