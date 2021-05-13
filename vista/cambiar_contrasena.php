<?php include("header_privado.php"); ?>
<?php require_once("../controlador/cambiar_contrasena_controlador.php");?>

<div class="section container">
    <div class="row center-align">
        <h2>Cambia tu contraseña</h2>
        <br><br>                       
    </div>
    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset="UTF-8" id="cambiopw">
            <input type="hidden" id="idp" name="idp" value=<?php echo $_SESSION["id"]; ?>>
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
                <button class="btn" name="cambiar" id="cambiar">Cambiar contraseña</button> 
            </div>
        </form>                    
    </div>
    <div class="row" id="respuesta">

    </div>
    
</div>
<script>
    $(document).ready(function(){
        var pw = "";
        var npw = "";
        var npw2 = "";
        var idp = "";

        $("#npw2").on("keyup", function(){
            validar();
        });

        $("#cambiar").on("click", function(e){
            e.preventDefault();
            var npw = $("#npw").val();
            var npw2 = $("#npw2").val();
            if(npw != npw2) {
                return false;
            } else {
                pw = $("#pw").val();
                npw = $("#npw").val();
                idp = $("#idp").val();
                $.ajax({
                    url: "../controlador/cambiar_contrasena_controlador.php",
                    type: "POST",
                    data: {pw:pw,npw:npw,idp:idp},

                    success: function(respuesta) {
                        if(respuesta == 0) {
                            $("#respuesta").html("<h4 class='red-text center-align'>La contraseña introducida no se corresponde con la almacenada en la base de datos.</h4>")
                        } else {
                            location.href = "perfil.php";
                        };
                    }
                });
            }   
                  
        });
          
        
    });

    function validar() {
        var npw = $("#npw").val();
        var npw2 = $("#npw2").val();
        if(npw != npw2) {
            $("#respuesta").html("<h4 class='red-text center-align'>La nueva contraseña no coincide.</h4>");
        } else {
            $("#respuesta").html("");
        }
    }
</script>

<?php include("footer_privado.php"); ?>