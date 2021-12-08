<?php

    if (basename($_SERVER['PHP_SELF']) == 'admin.php') {     
        $path = "php/";
        $css = "./recursos/CSS/bootstrap.css"; 
    } else {     
        $path = "";     
        $url = $_SERVER['PHP_SELF'];     
        $data = explode("php", $url);     
        $index = $data[0];     
        $css = "../recursos/CSS/bootstrap.css"; 
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Servidor Apache del Lampp</title>
        <link rel="stylesheet" href=<?php echo $css ?>>
    </head>
    <body style="background-color: #877FBC;">
        <div id="wrapper">
            <div id="cap" class="container text-center mt-3 p-3" style="color: #6B4809; background-color: #76D7C4; border-radius: 10px; border: 2px solid brown;">
                <h1>Projecte PHP David Pérez</h1>
            </div>