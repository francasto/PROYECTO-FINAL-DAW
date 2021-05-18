<?php include("header.php"); ?>
<div class="fondologin">
    <div class="fondoblanco">
        <div class="section container center"><a href="../index.php"><img src="../img/logoinicio.png" alt="logo"><img src="../img/nombre.png" alt="nombre"></a></div>
        <div class="section container">
            <div class="row center-align" id="contenido">
                <h4>Recuperar contraseña</h4>
                <h5>Introduce tu correo para recuperar tu contraseña</h5>
                <form action="../controlador/recuperar_contrasena_controlador.php" class="col s12 l6 offset-l3" method="post">
                    <div class="row card-panel">
                        <div class="input-field col s12">
                            <input type="email" id="correo" name="correo" class="validate" required>
                            <label for="correo">Email:</label>
                        </div>                                       
            
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

        $("#enviar").on("click", function(e){
            e.preventDefault();

            var correo = $("#correo").val();

            $.ajax({
                url: "../controlador/recuperar_contrasena_controlador.php",
                type: "POST",
                data: {correo:correo},

                success: function(respuesta) {
                    if(respuesta == 0) {
                        $("#respuesta").html("<h4 class='red-text center-align'>El correo introducido no existe en la base de datos.</h4>")
                    } else {
                        $("#contenido").hide();
                        $("#respuesta").html("<h1 class='green-text center-align'>El correo se ha enviado con éxito.</h1><br><a href='../index.php' class='btn'>Volver</a>");
                    };
                }
            });
        });          

    });
</script>
    
<?php include("footer.php"); ?>