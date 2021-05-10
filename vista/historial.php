<?php include("header_privado.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Histórico de pachangas</h2>
            <h6>Éstas son las pachangas en las que has participado hasta ahora.</h6>
            <br><br>                       
        </div>
    </div>
    <div class="section container">
        <div class="row">
            <?php require_once("../controlador/historial_controlador.php"); ?>
        </div>
        <?php $opc="historial";require_once("../controlador/paginacion_controlador.php");  ?>
    </div>



<?php include("footer_privado.php"); ?>