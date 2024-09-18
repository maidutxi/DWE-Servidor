<?php

    function encontrarfechas($texto){
        $patron = "/\b(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}\b/"; //para dd/mm/aaaa
        $arrayfechas=[];
        
        preg_match_all($patron, $texto, $coincidencias); //guarda el array con las fechas
        $arrayfechas=$coincidencias[0];

        return $arrayfechas;
        
        
    }

    $texto="El proyecto comenzó el 15/02/2022 y la primera fase se completó el 23/03/2022. La segunda fase estaba planeada para el 12/04/2022, pero fue pospuesta al 30/05/2022 debido a retrasos en la entrega de materiales. Finalmente, el proyecto se terminó el 18/08/2022. Además, la revisión final se programó para el 05/09/2022 y la presentación de resultados será el 25/09/2022.";
    $fechas=encontrarfechas($texto);

    print_r($fechas); //print_r se suele utilizar para imprimir arrays y objeto, aunque puede imprimir cualquier dato
?>