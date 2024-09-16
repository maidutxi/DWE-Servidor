<!DOCTYPE html>
<html>
<body>

<?php
$palabra="Maider";
$palabra=strtolower($palabra); //strtolower convierte todo en minúsculas

$invertida=strrev($palabra); //strrev invierte la palabra de atrás para adelante

if($palabra===$invertida){ //para igualar hay que poner 3
echo "Es palíndromo";
}
else{
echo "No es palíndromo";
}

?> 

</body>
</html>
