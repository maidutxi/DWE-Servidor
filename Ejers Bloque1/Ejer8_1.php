

<!DOCTYPE html>
<html>
<body>

<?php
//*
//***
//*****
//*******
//random_int(min,max) –numero aleatorio

$base=random_int(5,20);
$columna=0;

if($base%2){ // para saber si es par o impar ( si es par la 1º fila tendrá 2 estrellas y si no 1)
$columna=2;
}
else{
$columna=1;
}

while($columna < $base){ // la fila empecé siendo 1 o 2, imprimirá estrellas según par e impar
	for($x=0; $x<$columna; $x++){
    echo "*";
    }
    echo "<br>"; //salta de línea
    $columna=$columna +2; //uma dos a fila
}
    

?>

</body>
</html>
