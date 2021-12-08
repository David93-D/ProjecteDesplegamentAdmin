<?php

    session_start();

    $tipus_usuari = $_POST['tipus_usuari'];
    $idElegido = $_POST['id'];
    $nomMod = $_POST['nom'];
    $cognomMod = $_POST['cognom'];
    $poblacioMod = $_POST['poblacio'];    

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    if ( $tipus_usuari == "alumnat" ) {
        $actualitzacio = "UPDATE $tipus_usuari SET nom = '$nomMod', cognom = '$cognomMod', poblacio = '$poblacioMod' WHERE idalum = '$idElegido'";
    } else {
        $actualitzacio = "UPDATE $tipus_usuari SET nom = '$nomMod', cognoms = '$cognomMod', poblacio = '$poblacioMod' WHERE idprof = '$idElegido'";
    }

    include("./escriuLogAdmin.php");
    registraAccio( $_SESSION['usuari'], 'Dades Usuari '.$idElegido.' amb '.$tipus_usuari.' modificat', date('d-m-Y'), date('H:i:s'));

    $query = mysqli_query($connexio, $actualitzacio);

    mysqli_close($connexio);

    header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=gestio_Usuaris");

?>