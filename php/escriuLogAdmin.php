<?php

    function registraAccio( $nomUsuari, $Accio, $Dia, $Hora) {
        $liniaRegistrada = $nomUsuari." - ".$Accio." - Dia: ".$Dia." - Hora: ".$Hora;
        $ficher = fopen("../recursos/log/admin.log", "a");
        fwrite($ficher, $liniaRegistrada.PHP_EOL);
        fclose($ficher);
    }

?>