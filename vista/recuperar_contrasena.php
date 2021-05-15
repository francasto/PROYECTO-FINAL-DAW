<?php include("header.php"); 
    if(!isset($_GET["c"]) || !isset($_GET["t"])) {
        header("Location: ../index_.php");
    }
?>
<div class="fondologin">
    <div class="fondoblanco">
        <div class="section container center"><a href="../index_.php"><img src="../img/logoinicio.png" alt="logo"><img src="../img/nombre.png" alt="nombre"></a></div>
        <div class="section container">
            <div class="row center-align" id="contenido">
                <h4>Recuperar contraseña</h4>
                <h5>Introduce tu nueva contraseña</h5>
                <form action="../controlador/recuperar_contrasena_controlador.php" class="col s6 offset-s3" method="post">
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <input type="password" id="pw" name="pw" class="validate" required>
                            <label for="pw">Nueva contraseña:</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="password" id="pw2" name="pw2" class="validate" required>
                            <label for="pw2">Repita contraseña:</label>
                        </div> 
                        <input type="hidden" id="email" name="email" value="<?php echo $_GET['c'] ?>">
                        <input type="hidden" id="token" name="token" value="<?php echo $_GET['t'] ?>">                                      
            
                        <button class="btn" id="enviar" type="submit">Enviar</button>
                        
                    </div>                    
                </form>                                            
            </div>
            <div class="row col s12 center-align red-text" id="respuesta"></div> 
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function(){
        var email = "<?php echo $_GET['c'] ?>";
        var token = "<?php echo $_GET['t'] ?>";
        $.ajax({
            url: "../controlador/recuperar_contrasena_controlador.php",
            type: "POST",
            data: {email:email,token:token},

            success: function(respuesta) {
                if(respuesta == 0) {
                    $("#contenido").hide();
                    $("#respuesta").html("<h1 class='red-text center-align'>El formulario de recuperación ya no es válido. Solicite uno nuevo.</h1><br><a href='solicitar_contrasena.php' class='btn'>Volver</a>")          
                }
            }
        });

        $("#enviar").on("click", function(){
            var pw = $("#pw").val();
            var pw2 = $("#pw2").val();

            if(pw2 == "" || pw == "") {
                $("#respuesta").html("<h4 class='red-text center-align'>Todos los campos son obligatorios.</h4>")
                return false;
            } else if(pw != pw2) { 
                $("#respuesta").html("<h4 class='red-text center-align'>La nueva contraseña no coincide.</h4>");
                return false;
            } else {
                return true;
            } 
        });          

    });
</script>
    
<?php include("footer.php"); ?>