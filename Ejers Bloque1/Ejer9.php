<!DOCTYPE html>
<html>
<body>

<?php
$ventas=6000;
$comision;

if($ventas<10000){
	$comision=$ventas*0.05;
}

else if($ventas>=10000 && $ventas<20000){
	$comision=$ventas*0.08;
}

else if($ventas>=20000 && $ventas<40000){
	$comision=$ventas*0.10;
}
else{
	$comision=$ventas*0.13;
}

echo("La comisión del vendedor es de: " . $comision);
?>

</body>
</html>
