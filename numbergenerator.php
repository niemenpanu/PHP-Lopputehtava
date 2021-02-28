<?php

    $oikeat = array();
    while (count($oikeat) < 6) {
        $numero = rand(1, 30);
        if (in_array($numero, $oikeat)) {
        continue;
        }
        $oikeat[] = $numero;
    }
       
    sort($oikeat);
    
?>

