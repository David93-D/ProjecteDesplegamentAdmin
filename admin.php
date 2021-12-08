<?php
    require "./php/entity/dadesFormulari.php";
    
    session_start();

    $nomErroni = "";
    if (isset($_GET['nomErroni'])) {
        $nomErroni = $_GET['nomErroni'];
    }

    $paswdErronea = "";
    if (isset($_GET['paswdErronea'])) {
        $paswdErronea = $_GET['paswdErronea'];
    }

    $partial = "";
    if (isset($_GET['partial'])) {
        $partial = $_GET['partial'];
    }
    
    $visualitzaLog = "";
    if (isset($_GET['visualitzaLog'])) {
        $visualitzaLog = $_GET['visualitzaLog'];
    }

    $duplicat = "";
    if (isset($_GET['duplicat'])) {
        $duplicat = $_GET['duplicat'];
    } 

    $parametre = "";
    if (isset($_GET['parametre'])) {
        $parametre = $_GET['parametre'];
    }

    $dades = "";
    if (isset($_SESSION['dadesFormulari'])) {
        $dades = unserialize($_SESSION['dadesFormulari']);
    }

    $dadesArray = (array) $dades;
            
    $valoresArray = array_values($dadesArray);

    include "./php/partials/cap.partial.php";
?>

    <div class="container-fluid mt-2">
        <div class="row p-2" style="background-color: grey; text-align: center;">
            <div class="col m-1" style="background-color: #ACA8A8;"><a style="color: black;" href="admin.php">Inici Administració</a></div>
            <div class="col m-1" style="background-color: #ACA8A8;"><a style="color: black;" href="http://localhost/wwwDavidPerez/index.php">Inici Projecte</a></div><!-- FALTA IMPLEMENTAR -->
            <?php
                if (isset($_SESSION['usuari'])) {
                    echo "<div class='col m-1' style='background-color: #ACA8A8;'><a style='color: black;' href='admin.php?partial=gestio_Usuaris'>Gestió d´Usuaris</a></div>";
                    echo "<div class='col m-1' style='background-color: #ACA8A8;'><a style='color: black;' href='admin.php?partial=projectes'>Gestió de projectes</a></div>";
                }
            ?>
        </div>
    </div>

<?php

    include "./php/partials/benvinguda.partial.php";

    if ( $partial == "inici") {
        echo "<div class='container text-center'><h1>Inici Admin</h1></div>";
    } else if ( $partial == "projectes" ) {
        include "./php/partials/projectes.partial.php";
    } else if ( $partial == "edita" ) {
        include "./php/partials/editaUsuari.partial.php";
    } else if ( $partial == "gestio_Usuaris" ) {
        include "./php/partials/usuaris.partial.php";
    } else if ( $partial == "afegeix" ) {
        include "./php/partials/afegeixUsuari.partial.php";
    } else if ( isset($valor) ) {
        include "./php/partials/afegeixUsuari.partial.php";
    } else if ( isset($nomErroni) ) {
        include "./php/partials/login.partial.php";
    } else if ( isset($paswdErronea) ) {
        include "./php/partials/login.partial.php";
    } else if ( $nomErroni == "" && $paswdErronea == "" && $partial == "") {
        include "./php/partials/login.partial.php";
    }

    if ( $visualitzaLog == true) {
        include "./php/partials/visualitzaLog.partial.php";
    }

    include "./php/partials/peu.partial.php";

?>