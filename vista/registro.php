<?php include("header.php"); ?>

<div class="fondologin">
    <div class="fondoblanco">
        <div class="section container center"><a href="../index.php"><img src="../img/logoinicio.png" alt="logo"><img src="../img/nombre.png" alt="nombre"></a></div>
        <div class="section container">
            <div class="row center-align">
                <h4>Regístrate</h4>
                <form action="../controlador/registrar_controlador.php" class="col s12" method="post" accept-charset="UTF-8">
                    <div class="row card-panel">
                        <div class="input-field col s12 m4">
                            <input type="text" id="nombre" name="nombre" class="validate" required>
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="text" id="apellido1" name="apellido1" class="validate" required>
                            <label for="apellido1">Primer apellido:</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="text" id="apellido2" name="apellido2" class="validate" required>
                            <label for="apellido2">Segundo apellido:</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="tel" id="tel" name="tel" pattern="[0-9]{9}" class="validate" required>
                            <label for="tel">Teléfono:</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="email" id="email" name="email" class="validate" required>
                            <label for="email">Email:</label>
                        </div>
                        <div class="input-field col s12 m4">
                            <input type="password" id="pw" name="pw" class="validate" required>
                            <label for="pw">Password:</label>
                        </div>                      
            
                        <button class="btn" type="submit" id="registrar">Registrar</button>
                    </div>
                </form>
            </div>
            <h5 class="row center-align red-text s12">
                <?php include("../controlador/cookies.php"); ?>                    
            </h5>
        </div>
    </div>    
</div>

<script>
    $("form").on("submit", function() {
        $("#loading").show();
    });
</script>

<?php include("footer.php"); ?>