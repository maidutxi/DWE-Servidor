<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema = $_POST["tema"];
    $idioma = $_POST["idioma"];

    
    setcookie("tema", $tema, time() + (86400 * 30), "/"); //se guardan un día las cookies, si no pongo time al volver a entrar no se guarda
    setcookie("idioma", $idioma, time() + (86400 * 30), "/");

    
    header("Location: Ejer3.php");
    exit();
}
