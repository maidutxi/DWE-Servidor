<?php
   if($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombre=htmlspecialchars($_POST["nombre"]);
	$apellido=htmlspecialchars($_POST["apellido"]);
	$email=htmlspecialchars($_POST["email"]);
	$telefono=htmlspecialchars($_POST["telefono"]);
	
	echo "<h1>Contacto agregado:</h1";
	echo "Nombre: ". $nombre."<br>";
	echo "apellido: ". $apellido."<br>";
	echo "Email: ". $email."<br>";
	echo "Telefono: " $telefono."<br>";
   }
   else{
	echo "No se han enviado datos";

?>
