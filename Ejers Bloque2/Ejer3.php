<!DOCTYPE html>
<html>
<head>
    <style>
        /* Estilo para la tabla */
        .bordered-table {
            border: 2px solid black; 
            border-collapse: collapse;  
            
        }
        /* Estilo para las celdas */
        .bordered-table td {
            border: none; 
            padding: 10px; 
        }
    </style>
</head>
<body>

<?php
$datos = array(
    "nombre" => "Juan Pérez",
    "puesto" => "Analista",
    "antiguedad" => 8,
    "empresa" => "Zubiri-Manteo"
);

function creartarjeta($datos) {
    if (!isset($datos['nombre']) || !isset($datos['puesto']) || !isset($datos['antiguedad']) || !isset($datos['empresa'])) {
        echo "Los datos no están completos";
        return; 
    }

    
    echo "<table class='bordered-table'>";
    echo "<tr><td>{$datos['nombre']}</td></tr>";
    echo "<tr><td>{$datos['puesto']}, {$datos['antiguedad']} años</td></tr>";
    echo "<tr><td>{$datos['empresa']}</td></tr>";
    echo "</table>";
}

creartarjeta($datos);
?>

</body>
</html>
