<?php

    $idModificar = "";
    if (isset($_GET['id'])) {
        $idModificar = $_GET['id'];
    }

    $rol = "";
    if (isset($_GET['rol'])) {
        $rol = $_GET['rol'];
    }

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    if ($rol == "alumnat") {

        $usuariModificar = "SELECT idalum, nom, cognom, email, poblacio, contrasenya, rol, data FROM $rol WHERE idalum = '$idModificar'";
        $consulta_Usuari = mysqli_query($connexio, $usuariModificar);
        $filaConsultada = $consulta_Usuari->fetch_assoc();

    } else {

        $usuariModificar = "SELECT idprof, nom, cognoms, email, poblacio, contrasenya, rol, data FROM $rol WHERE idprof = '$idModificar'";
        $consulta_Usuari = mysqli_query($connexio, $usuariModificar);
        $filaConsultada = $consulta_Usuari->fetch_assoc();
        echo $filaConsultada;  
    }

?>

<main class="container mt-4">
    <div>
        <h3>Edita Dades d´Usuari</h3>
    </div>
    <div class="p-5" style="background-color: #C3932C;">
        <form action="php/processaEditaUsuari.php" method="post" >
            <div class="form-group">
                <label for="id">Id</label>
                <input type="text" name="id" class="form-control" id="nom" placeholder="Introdueix el teu nom" value="<?php if ($rol == "alumnat") {
                        echo $filaConsultada['idalum'];
                    } else {
                        echo $filaConsultada['idprof'];
                    }
                ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Introdueix el teu nom" value="<?php echo $filaConsultada['nom'] ?>" required>
            </div>
            <div class="form-group">
                <label for="cognom">Cognoms</label>
                <input type="name" name="cognom" class="form-control" id="cognom" placeholder="Introdueix el teu cognom" value="<?php echo $filaConsultada['cognom'] ?>" required>
            </div>
            <div class="form-group">
                <label for="poblacio">Població</label>
                <input type="name" name="poblacio" class="form-control" id="poblacio" placeholder="Introdueix la població" value="<?php echo $filaConsultada['poblacio'] ?>" required>
            </div>
            <div class="form-group">
                <label for="contrasenya">Contrasenya</label>
                <input type="name" name="contrasenya" class="form-control" id="contrasenya" placeholder="Introdueix la contrasenya" value="<?php echo $filaConsultada['contrasenya'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Introdueix el teu email" pattern=".+@gmail.com" value="<?php echo $filaConsultada['email'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tipus_usuari">Tipus d´Usuari</label>
                <input type="text" name="tipus_usuari" class="form-control" value="<?php echo $filaConsultada['rol'] ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" name="data" class="form-control" id="data" placeholder="Introdueix la data" value="<?php echo $filaConsultada['data'] ?>" readonly>
            </div>
            <p></p>
            <input type="submit" class="btn btn-primary" value="Envia" />
        </form>
    </div>
    <div class="text-center mt-2">
        <a class="btn btn-info" href="admin.php?partial=gestio_Usuaris" ?>Cancel·la Edició</a>
    </div>
</main>