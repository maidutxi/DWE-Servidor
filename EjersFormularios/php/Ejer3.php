<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contraseña1 = htmlspecialchars($_POST["contraseña"]);
    $contraseña2 = htmlspecialchars($_POST["contraseña2"]);
    
   
    if ($contraseña1 == $contraseña2) {
        echo htmlspecialchars($_POST["nombre"]) . " " . htmlspecialchars($_POST["email"]) . ". Las contraseñas coinciden.";
    } else {
        echo htmlspecialchars($_POST["nombre"]) . " " . htmlspecialchars($_POST["email"]) . ". Las contraseñas no coinciden.";
    }
  }
?>
