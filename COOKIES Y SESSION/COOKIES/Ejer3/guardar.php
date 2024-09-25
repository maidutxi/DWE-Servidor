<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema = $_POST["tema"];
    $idioma = $_POST["idioma"];

    
    setcookie("tema", $tema);
    setcookie("idioma", $idioma);

    
    header("Location: Ejer3.php");
    exit();
}
