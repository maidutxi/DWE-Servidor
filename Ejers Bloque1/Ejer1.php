<!DOCTYPE html>
<html>
<body>

<?php

$pisos = 3;
$puertas_por_piso = 4;


$contador_casas = 1;


echo "<h2>Lista de casas en la comunidad:</h2>";

for ($i = 1; $i <= $pisos; $i++) {
    for ($j = 1; $j <= $puertas_por_piso; $j++) {
        echo "Casa $contador_casas - Piso $i - Puerta $j<br>";
        $contador_casas++;
    }
}
?>

</body>
</html>

