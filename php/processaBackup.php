<?php

    session_start();

    // $nomUsuari = $_POST['nom_Usuari'];
    // $contrasenyaUsuari = $_POST['contrasenya_Usuari'];

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    // ESCRIBIR PROFESORES
    $profesorat = "SELECT * FROM professorat";
    $consulta_profesorat =  mysqli_query($connexio, $profesorat);

    // AÑADIMOS LOS PROFESORES A UNA VARIABLE Y LOS ESCRIBIMOS EN EL ARCHIVO
    $contingutFicher1 = "";
    while ($filesConsultaProfesorat = mysqli_fetch_array($consulta_profesorat)) {

        $contingutFicher1 .= $filesConsultaProfesorat['idprof']."::"
                            .$filesConsultaProfesorat['nom']."::"
                            .$filesConsultaProfesorat['cognoms']."::"
                            .$filesConsultaProfesorat['email']."::"
                            .$filesConsultaProfesorat['poblacio']."::"
                            .$filesConsultaProfesorat['rol']."::"
                            .$filesConsultaProfesorat['data']."::"
                            .$filesConsultaProfesorat['imatgeperfil']."\n";

    }
    
    $fitxerProfesors = "backup_prof_".date('dmY')."_".date('His').".txt"; // NOMBRE DEL ARCHIVO
    $ficher1 = fopen("../recursos/backups/".$fitxerProfesors, "w"); // AL NO EXISTIR SE CREA EL ARCHIVO

    fwrite($ficher1, $contingutFicher1); // ESCRIBIMOS EL CONTENIDO DENTRO DEL ARCHIVO
    fclose($ficher1); // CERRAMOS EL ARCHIVO

    // ESCRIBIR ALUMNOS
    $alumnat = "SELECT * FROM alumnat";
    $consulta_alumnat =  mysqli_query($connexio, $alumnat);

    // AÑADIMOS LOS ALUMNOS A UNA VARIABLE Y LOS ESCRIBIMOS EN EL ARCHIVO
    $contingutFicher2 = "";
    while ($filesConsultaAlumnat = mysqli_fetch_array($consulta_alumnat)) {

        $contingutFicher2 .= $filesConsultaAlumnat['idalum']."::"
                            .$filesConsultaAlumnat['nom']."::"
                            .$filesConsultaAlumnat['cognom']."::"
                            .$filesConsultaAlumnat['email']."::"
                            .$filesConsultaAlumnat['poblacio']."::"
                            .$filesConsultaAlumnat['rol']."::"
                            .$filesConsultaAlumnat['data']."::"
                            .$filesConsultaAlumnat['imatgeperfil']."\n";

    }
    
    $fitxerAlumnes = "backup_alum_".date('dmY')."_".date('His').".txt";
    $ficher2 = fopen("../recursos/backups/".$fitxerAlumnes, "w");

    fwrite($ficher2, $contingutFicher2);
    fclose($ficher2);

    include("./escriuLogAdmin.php");
    registraAccio( $_SESSION['usuari'], 'BackUp realitzat ', date('d-m-Y'), date('H:i:s'));

    header("Location: http://localhost/wwwDavidPerezAdmin/admin.php?partial=gestio_Usuaris");

?>