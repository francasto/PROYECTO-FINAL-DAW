<?php include("header_privado.php"); ?>

        <div class="section container">
            <div class="row center-align">
                <h1>Pachangas en curso</h1>
                <?php
                    echo "Hola: " . $_SESSION["usuario"] . "<br><br>";
                ?>
                <a href="<?php echo $_SERVER['PHP_SELF'];?> " class="btn">actualizar pachangas</a>
                <a href="../controlador/cerrarsesion.php" class="btn">Cerrar sesión</a>                
            </div>
        </div>
        <div class="section container">
            <div class="row"> 
                <?php require_once("../modelo/pachangas_modelo.php"); ?>
                <?php require_once("../controlador/pachangas_controlador.php"); ?>
            </div>
            <div class="row center-align">
                <ul class="pagination">
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active waves-effect"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>

<?php include("footer_privado.php"); ?>