<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST["nombre"])){
        $nombreErr="El nombre es obligatorio";
    }
    else{
        $usuario = htmlspecialchars($_POST['nombre']);
        $usuario=stripslashes($usuario);
        $usuario=trim($usuario);
    }
    
    $valoracion = (int) $_POST['valoracion'];
    $comentario = htmlspecialchars($_POST['comentario']);

    
    echo "<h1>Valoración recibida</h1>";
    echo "<p><strong>Usuario:</strong> $usuario</p>";
    echo "<p><strong>Valoración:</strong> $valoracion</p>";
    echo "<p><strong>Comentario:</strong> $comentario</p>";
} else {
    echo "<p>No se ha enviado ningún formulario.</p>";
}
?>
