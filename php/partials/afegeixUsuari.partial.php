<main class="container mt-4">
                <div>
                    <h3>Registre Usuari Nou</h3>
                </div>
                <div class="p-5" style="background-color: #C3932C;"> <!-- enctype="multipart/form-data" -->
                    <form action="php/processaAfegeixUsuari.php" method="post" >
                        <div class="form-group">
                            <label for="nombre">Nom</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Introdueix el teu nom" value="<?php 
                            if(isset($valoresArray[0])) {
                                echo $valoresArray[0];
                            } 
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cognoms">Cognoms</label>
                            <input type="name" name="cognoms" class="form-control" id="cognoms" aria-describedby="emailHelp" placeholder="Introdueix el teu cognom" value="<?php
                            if(isset($valoresArray[1])) {
                                echo $valoresArray[1];
                            }
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="poblacio">Població</label>
                            <input type="name" name="poblacio" class="form-control" id="poblacio" aria-describedby="emailHelp" placeholder="Introdueix la població" value="<?php 
                            if(isset($valoresArray[2])) {
                                echo $valoresArray[2];
                            }
                            ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introdueix el teu email" pattern=".+@gmail.com" value="<?php 
                            if(isset($valoresArray[3])) {
                                echo $valoresArray[3];
                            }
                            ?>" required>
                            <span style="color: #B82B17; font-weight: bold;">
                                <?php echo $duplicat; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="contrasenya">Contrasenya</label>
                            <input type="password" name="contrasenya" class="form-control" id="contrasenya" placeholder="Contrasenya" value="<?php
                            if(isset($valoresArray[4])) {
                                echo $valoresArray[4];
                            }
                            ?>" required minlength="6">
                        </div>
                        <div class="form-group">
                            <label for="contrasenya_conf">Confirma Contrasenya</label>
                            <input type="password" name="contrasenya_conf" class="form-control" id="contrasenya_conf" placeholder="Repetir contrasenya" value="<?php
                            if(isset($valoresArray[5])) {
                                echo $valoresArray[5];
                            }
                            ?>" required>
                            <span style="color: #B82B17; font-weight: bold;">
                                <?php echo $parametre; ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="tipus_usuari">Tipus d´Usuari</label>
                            <select class="form-select" name="tipus_usuari" id="tipus_usuari">
                                <option value="Alumne">Alumne</option>
                                <option value="Profesor">Profesor</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                        <p></p>
                        <input type="submit" class="btn btn-primary" value="Envia" />
                    </form>
                </div>
                <p></p>
                <div class="text-center">
                    <a class="btn btn-info" href="admin.php?partial=gestio_Usuaris">Cancela</a>
                </div>
            </main>