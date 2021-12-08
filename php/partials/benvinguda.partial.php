<?php

    if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
        $benvinguda = "./php/desconnecta.php";
    } else {   
        $benvinguda = "./desconnecta.php"; 
    }

    if (isset($_SESSION['usuari'])) {
        echo "<h4>Hola Admin.<a href='$benvinguda'>Desconecta't</a></h4>";
    }
?>