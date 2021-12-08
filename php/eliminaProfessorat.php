<?php

    session_start();

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    $idProf = "";
    if (isset($_GET['id'])) {
        $idProf = trim($_GET['id']);
    }

    $nombreImagen = "SELECT imatgeperfil FROM professorat WHERE idprof = '$idProf'";
    $resultat = mysqli_query($connexio, $nombreImagen);

    if ( $resultat != "imatgedefecte.png" ) {
        $ruta = "../../wwwDavidPerez/recursos/img/imatgesperfil/professorat/$nombreImagen";
        unlink($ruta);
    }

    $actualitzacio = "DELETE FROM professorat WHERE idprof = '$idProf'";
    $query = mysqli_query($connexio, $actualitzacio);

    //Registro de baja de usuario
    include("./escriuLogAdmin.php");
    registraAccio( $_SESSION['usuari'], 'Eliminat profesorat amd id '.$idProf, date('d-m-Y'), date('H:i:s'));

    mysqli_close($connexio);


    header("Location: ../admin.php?partial=gestio_Usuaris");

?>