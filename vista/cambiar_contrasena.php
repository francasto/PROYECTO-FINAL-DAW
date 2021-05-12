<?php include("header_privado.php"); ?>
<?php //require_once("../controlador/cambiar_contrasena_controlador.php"); ?>

<div class="section container">
    <div class="row center-align">
        <h2>Cambia tu contraseña</h2>
        <br><br>                       
    </div>
    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" accept-charset="UTF-8">
            <table class="col s6 centered offset-s3 fondogris white-text">
                <tr>
                    <th>Contraseña anterior:</th>
                    <td><input type="password" name="pw" id="pw" class="validate white-text center-align" value="" required></td>
                </tr>
                <tr>
                    <th>Nueva contraseña:</th>
                    <td><input type="password" name="npw" id="npw" class="validate white-text center-align" value="" required></td>
                </tr>
                <tr>
                    <th>Repite la nueva contraseña:</th>
                    <td><input type="password" name="npw2" id="npw2" class="validate white-text center-align" value="" required></td>
                </tr>                    
            </table> 
            <div class="row col s12 center-align">
                <br>
                <button class="btn" type="submit" name="cambiar" id="cambiar">Cambiar contraseña</button> 
            </div>
        </form>                    
    </div>
    <div class="row" id="respuesta">

    </div>
    
</div>
<script>
    $(document).ready(function(){
        $('.cambiar').on("click", function(e){
            e.preventDefault();

            $.ajax({
                url: "../controlador/cambiar_contrasena_controlador.php",
                type: "post",
                data: {},
                success: function(respuesta) {
                    $("#respuesta").html(respuesta);
                }
            });                             
        });
    })
</script>

<?php include("footer_privado.php"); ?>