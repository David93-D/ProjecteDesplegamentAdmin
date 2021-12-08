<div class="container bg-success">
<h4 class="text-center">Log Administración <?php echo $_SESSION['usuari'] ?></h4>
    <?php
        $patron = "/".$_SESSION['usuari']."/";
        $ficher = fopen("./recursos/log/admin.log", "r");
        while(!feof($ficher)) {
            $linea = fgets($ficher);
            if (preg_match($patron, $linea)) {
                echo $linea."<br>";
            }
        }
        fclose($ficher);
    ?>
</div>