<!DOCTYPE html>
<html>
<body>

<?php
$datos = array(
    array("Jon", 20, "Bilbo"),
    array("Ane", 32, "Donosti"),
    array("Urko", 14, "Gasteiz"),
    array("Miren", 23, "Donosti")
);

function tabladatos($datos) {
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Edad</th><th>Ciudad</th></tr>";
    
    for ($i = 0; $i < count($datos); $i++) {
        echo "<tr>";
        for ($j = 0; $j < count($datos[$i]); $j++) {
            echo "<td>{$datos[$i][$j]}</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";
}

tabladatos($datos);
?>

</body>
</html>
