<?php
    session_start();

    include("./escriuLogAdmin.php");
    registraAccio( $_SESSION['usuari'], 'Logout', date('d-m-Y'), date('H:i:s'));

    session_unset();
    session_destroy();

    header("Location: ../admin.php");

?>