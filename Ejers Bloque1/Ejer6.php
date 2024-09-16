
<!DOCTYPE html>
<html>
<body>

<?php
//pow(base, exponente); 
//elevar, pow(2,3) = 8
$potencia=3;
$cantidad=100;
$i=1;

while(pow($i,$potencia)<$cantidad){
    	$resultado=pow($i,$potencia);
        echo ($i . "-" . $resultado . "<br>");
    	$i++;
    
}

?>

</body>
</html>
