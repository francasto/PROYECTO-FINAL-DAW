<?php include("header.php"); ?>
<div class="fondologin">
    <div class="fondoblanco">
        <div class="section container center"><a href="../index.php"><img src="../img/logoinicio.png" alt="logo"><img src="../img/nombre.png" alt="nombre"></a></div>
        <div class="section container">
            <div class="row center-align">
                <h4>Inicia sesión</h4>
                <form action="../controlador/validar.php" class="col s12 l6 offset-l3" method="post">
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <input type="email" id="email" name="email" class="validate" required>
                            <label for="email">Email:</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="password" id="password" name="password" class="validate" required>
                            <label for="password">Contraseña:</label>
                        </div>                    
            
                        <button class="btn" type="submit">Entrar</button>
                        <div class="row"><br></div>
                        <p>¿No tienes cuenta? <a href="reglog.php">Regístrate aquí.</a></p>
                        <p>¿Olvidaste tu contraseña? <a href="solicitar_contrasena.php">Clic aquí.</a></p>
                    </div>                    
                </form>                             
            </div>
            <h5 class="row center-align red-text s12">
                <?php include("../controlador/cookies.php"); ?>                    
            </h5>
        </div>
    </div>
    
</div>
    
<?php include("footer.php"); ?>