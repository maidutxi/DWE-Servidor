<!DOCTYPE html>
<html>
<body>

<?php
$num = 40;  

while ($num != 1) {
    if ($num % 2 == 0) {
        $num = $num / 2;
    } else {
        $num = ($num * 3) + 1;
    }
    echo $num . "<br>";  
}
?>

</body>
</html>
