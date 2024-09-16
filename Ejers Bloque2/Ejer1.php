<!DOCTYPE html>
<html>
<body>

<?php
$numero = 2; // Número para la tabla de multiplicar

function tablamultiplicar($num) {
    echo "<table border='1'>";
    echo "<tr><th>Expresión</th><th>Resultado</th></tr>"; //th es como td pero para encabezados
    for($i = 1; $i <= 9; $i++) {
        $resultado = $num * $i;
        echo "<tr><td>{$num} x {$i}</td><td>{$resultado}</td></tr>";
    }
    echo "</table>";
}

tablamultiplicar($numero);
?>

</body>
</html>
