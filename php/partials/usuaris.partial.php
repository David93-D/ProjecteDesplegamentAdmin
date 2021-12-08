<?php

    $servidor = "192.168.1.132";
    $usuari = "projectes_davidperez";
    $pasword = "projectes_davidperez";
    $basedades = "projectes_davidperez";

    // Establecemos la conexión
    $connexio = mysqli_connect($servidor, $usuari, $pasword, $basedades);

    $usuari_Profesor = "SELECT idprof, nom, cognoms, email, poblacio, rol, imatgeperfil, data FROM professorat";
    $consultaUsuari_Profesor = mysqli_query($connexio, $usuari_Profesor);

    $usuari_Alumne = "SELECT idalum, nom, cognom, email, poblacio, rol, imatgeperfil, data FROM alumnat";
    $consultaUsuari_Alumne = mysqli_query($connexio, $usuari_Alumne);
    
?>

<main class="container">
    <div class="text-center">
        <h3>Administració :: Gestió d´Usuaris</h3>
    </div>
    <div class="text-center mb-2">
            <table class="table border">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Cognoms</th>
                        <th scope="col">Email</th>
                        <th scope="col">Població</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Data Creació</th>
                        <th scope="col">Imatge</th>
                        <th scope="col" colsan="2">Accions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        while ($consulta_Profesor = mysqli_fetch_array($consultaUsuari_Profesor)) {
                    ?>

                        <tr class="bg-secondary">
                            <td><?php echo $consulta_Profesor['idprof'] ?></td>
                            <td><?php echo $consulta_Profesor['nom'] ?></td>
                            <td><?php echo $consulta_Profesor['cognoms'] ?></td>
                            <td><?php echo $consulta_Profesor['email'] ?></td>
                            <td><?php echo $consulta_Profesor['poblacio'] ?></td>
                            <td><?php echo $consulta_Profesor['rol'] ?></td>
                            <td><?php echo $consulta_Profesor['data'] ?></td>
                            <td><?php echo $consulta_Profesor['imatgeperfil'] ?></td>

                            <?php if ( $consulta_Profesor['rol'] != "admin" ) { ?>

                                <td><a class="btn btn-danger" href="./php/eliminaProfessorat.php?id=
                                    <?php echo $consulta_Profesor['idprof']; ?>">Elimina</a></td>
                                <td><a class="btn btn-light" href="./admin.php?partial=edita&id=
                                    <?php echo $consulta_Profesor['idprof']; ?>"&rol=<?php echo $consulta_Profesor['rol'];?>>Modifica</a></td>
                            
                            <?php } ?>
                        
                        </tr>                       

                    <?php 
                        }
                    ?>

                    <?php
                        while ($consulta_Alumne = $consultaUsuari_Alumne->fetch_assoc()) {
                    ?>

                        <tr class="bg-success">
                            <td><?php echo $consulta_Alumne['idalum'] ?></td>
                            <td><?php echo $consulta_Alumne['nom'] ?></td>
                            <td><?php echo $consulta_Alumne['cognom'] ?></td>
                            <td><?php echo $consulta_Alumne['email'] ?></td>
                            <td><?php echo $consulta_Alumne['poblacio'] ?></td>
                            <td><?php echo $consulta_Alumne['rol'] ?></td>
                            <td><?php echo $consulta_Alumne['data'] ?></td>
                            <td><?php echo $consulta_Alumne['imatgeperfil'] ?></td>
                            <td><a class="btn btn-danger" href="./php/eliminaAlumnat.php?id=
                                <?php echo $consulta_Alumne['idalum']; ?>">Elimina</a></td>
                            <td><a class="btn btn-light" href="admin.php?partial=edita&id=
                                <?php echo $consulta_Alumne['idalum']; ?>&rol=<?php echo $consulta_Alumne['rol'];?>">Modifica</a></td>
                        </tr>                       

                    <?php 
                        }
                    ?>

                </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-success" href="admin.php?partial=afegeix">Afegeix usuair nou</a>
            <a class="btn btn-warning" href="./php/processaBackup.php">Fes un backup dels usuaris</a>
            <a class="btn btn-info" href="admin.php?partial=gestio_Usuaris&visualitzaLog=true">Visualitza Log</a>
        </div>
    </div>
</main>