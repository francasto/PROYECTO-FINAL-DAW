<?php include("header_privado.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Buscar pachangas</h2>
            <h6>Aquí podrás buscar pachangas públicas por ciudad o localidad.</h6>
            <h6>También podrás introducir el código de una pachanga privada.</h6>
            <br><br>
            <nav class="green accent-2 col s12 m12 l6 offset-l3">
                <div class="nav-wrapper">
                    <form action="#" method="post">
                        <div class="input-field">
                        <input id="buscar" name="buscar" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>              
        </div>
        <div class="row center-align" id="resultado">
            <?php require_once("../modelo/buscar_modelo.php"); ?>
            <?php require_once("../controlador/buscar_controlador.php"); ?>
        </div>
    </div>

    <script>
    $(document).ready(function(){
        $('.buscar').on("click", function(e){
            e.preventDefault();

            $.ajax({
                url: "../controlador/buscar_controlador.php",
                type: "post",
                success: function(respuesta) {
		            $("#respuesta").html(respuesta);
                }
            });                             
        });
    })
</script>

<?php include("footer_privado.php"); ?>