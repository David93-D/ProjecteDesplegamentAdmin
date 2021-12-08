<?php

    session_start();

    $nom = trim($_POST['nombre']);
    $cognoms = trim($_POST['cognoms']);
    $poblacio = trim($_POST['poblacio']);
    $email = $_POST['email'];
    $contrasenya = $_POST['contrasenya'];
    $contrasenya_conf = $_POST['contrasenya_conf'];
    $tipus_usuari = $_POST['tipus_usuari'];

    include("./entity/dadesFormulari.php");
    $dades = new DadesFormulari($nom, $cognoms, $poblacio, $email, $contrasenya, $contrasenya_conf, $tipus_usuari);
    $_SESSION['dadesFormulari'] = serialize($dades);

    if ( $contrasenya != $contrasenya_conf ) {
        $parametre = "Les contrasenyes han de coincidir";
        header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=afegeix&parametre=$parametre");
        die();
    }

    $contrasenya_hashed = password_hash($contrasenya, PASSWORD_BCRYPT);

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    if ($tipus_usuari == "Alumne") {
        $comprobarCorreu = "SELECT * FROM alumnat WHERE email = '$email'";
        $resultat = mysqli_query($connexio, $comprobarCorreu);
        if (mysqli_num_rows($resultat) == 0) {
            // 
            // Introducimos la instrucción SQL en la variable $sql
            $sql = "INSERT INTO alumnat (nom, cognom, email, poblacio, contrasenya, rol, data, imatgeperfil)
            VALUES ('$nom', '$cognoms', '$email', '$poblacio', '$contrasenya_hashed', 'alumnat', now(), 'imatgedefecte.png')";
            // Executem la instrucci�, comprovant si hi ha hagut algun tipus d'error
            if (mysqli_query($connexio, $sql)) {
                $ultim_id = mysqli_insert_id($connexio); 
                    echo "S´ha creat un nou usuari Alumne: ".$ultim_id;
            } else {
                    echo "Error: ". $sql . "<br/>" . mysqli_error ($connexio);
            }

            //Registro de creación de nuevo usuario
            include("./escriuLogAdmin.php");
            registraAccio( $_SESSION['usuari'], 'Nou usuari '.$email.' amb '.$tipus_usuari, date('d-m-Y'), date('H:i:s'));

            unset($_SESSION['dadesFormulari']);

            //Cerramos la connexión antes de acabar
            mysqli_close($connexio);

            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=gestio_Usuaris");

        } else {
            $duplicat = "El alumne ya existeix";
            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=afegeix&duplicat=$duplicat");
        }                       
    } else {
        $comprobarCorreu ="SELECT * FROM professorat WHERE email = '$email'";
        $resultat = mysqli_query($connexio, $comprobarCorreu);
        if (mysqli_num_rows($resultat) == 0) {
            $sql = "INSERT INTO professorat (nom, cognoms, email, poblacio, contrasenya, rol, data, imatgeperfil)
            VALUES ('$nom', '$cognoms', '$email', '$poblacio', '$contrasenya_hashed', 'professorat', now(), 'imatgedefecte.png')";
            if (mysqli_query($connexio, $sql)) {
                $ultim_id = mysqli_insert_id($connexio); 
                echo "S´ha creat un nou usuari Professor: ".$ultim_id;
            } else {
                echo "Error: ". $sql . "<br/>" . mysqli_error ($connexio);
            }

            include("./escriuLogAdmin.php");
            registraAccio( $_SESSION['usuari'], 'Nou usuari '.$email.' amb '.$tipus_usuari, date('d-m-Y'), date('H:i:s'));

            unset($_SESSION['dadesFormulari']);

            mysqli_close($connexio);

            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=gestio_Usuaris");

        } else {
            $duplicat = "El professor ya existeix";
            header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=afegeix&duplicat=$duplicat");
        }
    }


?>