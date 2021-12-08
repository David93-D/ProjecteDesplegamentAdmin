<main class="container mt-4">
    <div>
        <h3>Administració: Login</h3>
    </div>
    <div class="p-5" style="background-color: #C3932C;">
        <form action="./php/processaLoginAdmin.php" method="post">
            <div class="form-group">
                <label for="nom_Usuari">Nom Usuari</label>
                <input type="name" name="nom_Usuari" class="form-control" id="nom_Usuari" placeholder="Introdueix el teu Nom">
                <span style="color: #B82B17; font-weight: bold;">
                    <?php echo $nomErroni; ?>
                </span>
            </div>
            <div class="form-group">
                <label for="contrasenya_Usuari">Contrasenya</label>
                <input type="password" name="contrasenya_Usuari" class="form-control" id="contrasenya_Usuari" placeholder="Password">
                <span style="color: #B82B17; font-weight: bold;">
                    <?php echo $paswdErronea; ?>
                </span>
            </div>
            <p></p>
            <button type="submit" class="btn btn-primary">Envia</button>
        </form>
    </div>
</main>