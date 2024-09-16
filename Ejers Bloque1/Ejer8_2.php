

<!DOCTYPE html>
<html>
<body>

<?php
   //*
  //***
 //*****
//*******
 
$base = 11;
if ($base % 2 != 0) { // Verifica si la base es impar
    for ($j = 0; $j < $base; $j++) { // Itera sobre cada línea
        for ($v = $base; $v > $j; $v--) { // Imprime espacios para alinear las estrellas
            echo "<br>"; // Espacio 
        }
        for ($i = 0; $i < $j; $i++) { // Imprime asteriscos
            echo "* "; // Espacio adicional después del asterisco
        }
        
        echo "<br>"; // Salto de línea después de cada fila
    }
}
?>


</body>
</html>
