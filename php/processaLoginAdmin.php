<?php

    session_start();

    $nomUsuari = $_POST['nom_Usuari'];
    $contrasenyaUsuari = $_POST['contrasenya_Usuari'];

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    $comprobarNom = "SELECT nom FROM professorat WHERE nom = '$nomUsuari'";
    $consulta_Nom = mysqli_query($connexio, $comprobarNom);
    $filaConsultada = $consulta_Nom->fetch_assoc();

    if ($filaConsultada['nom'] == $nomUsuari) {
        $hash = "SELECT contrasenya FROM professorat WHERE nom = '$nomUsuari'";
        $consulta_hash = mysqli_query($connexio, $hash);
        $filaConsultada = $consulta_hash->fetch_assoc();
        $usuariValid = password_verify($contrasenyaUsuari, $filaConsultada['contrasenya']);

        if ($usuariValid) {

            $_SESSION['usuari'] = $nomUsuari;
            $_SESSION['tipus'] = "admin";

            //Registro de login correcto
            include("./escriuLogAdmin.php");
            registraAccio( $_SESSION['usuari'], 'Login', date('d-m-Y'), date('H:i:s'));


            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=inici");

        } else {
            $paswdErronea = "La contrasenya no és correcta";
            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?paswdErronea=$paswdErronea");
        }


    } else {
        $nomErroni = "L´usuari no és vàlid.";
        header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?nomErroni=$nomErroni");
    }


?>