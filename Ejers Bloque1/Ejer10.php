<!DOCTYPE html>
<html>
<body>

<?php
$total_compra=20.99;
$tipo_compra="mascotas";
$gastos_envio=0;

if($total_compra<19){
	if($tipo_compra=="mascotas"){
    	echo ("No se puede enviar");
        $gastos_envio=0;
    }
    else if($tipo_compra=="ropa"){
    	echo("Los gastos de envío son 9 euros");
        $gastos_envio=9;
    }
}

else if($total_compra>=19 && $total_compra<=40){
	echo("Los gastos de envío son 9 euros");
    $gastos_envio=9;
}

else if($total_compra>80){
	echo ("Los gastos de envío son gratuitos");
    $gastos_envio=0;
}

if($tipo_compra=="mascotas"){
	echo("<br>El total es de: " . (($total_compra*0.10)+ $total_compra+ $gastos_envio));
}

else if($tipo_compra=="ropa"){
	echo("<br>El total ed de: " . (($total_compra*0.21)+$total_compra+ $gastos_envio));
}

?>

</body>
</html>
