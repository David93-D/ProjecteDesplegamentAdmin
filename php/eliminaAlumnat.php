<?php

    session_start();

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    $idAlumn = "";
    if (isset($_GET['id'])) {
        $idAlumn = trim($_GET['id']);
    }

    $nombreImagen = "SELECT imatgeperfil FROM alumnat WHERE idprof = '$idAlumn'";
    $resultat = mysqli_query($connexio, $nombreImagen);

    if ( $resultat != "imatgedefecte.png" ) {
        $ruta = "../../wwwDavidPerez/recursos/img/imatgesperfil/alumnat/$nombreImagen";
        unlink($ruta);
    }

    $actualitzacio = "DELETE FROM alumnat WHERE idalum = '$idAlumn'";
    $query = mysqli_query($connexio, $actualitzacio);

    //Registro de baja de usuario
    include("./escriuLogAdmin.php");
    registraAccio( $_SESSION['usuari'], 'Eliminat Alumne amb id '.$idAlumn, date('d-m-Y'), date('H:i:s'));

    mysqli_close($connexio);


    header("Location: ../admin.php?partial=gestio_Usuaris");

?>