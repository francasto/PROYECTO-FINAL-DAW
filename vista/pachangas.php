<?php include("header_privado.php"); ?>


<div class="section container">
    <div class="row center-align">
        <h2>Pachangas en curso</h2>
        <a href="<?php echo $_SERVER['PHP_SELF'];?> " class="btn green accent-2 black-text">actualizar pachangas</a>                
    </div>
</div>
<div class="section container">
    <div class="row"> 
        <?php require_once("../controlador/pachangas_controlador.php"); ?>
    </div>
    
    <div class="row">
        <div id="modal1" class="modal center-align">
            <div class="modal-content center-align orange darken-4">
                <h4>¿Estás seguro de que quieres cancelar la pachanga?</h4>
                <h5>Todos los datos relativos a esta pachanga serán eliminados.</h5>
            </div>
            <div class="modal-footer orange darken-4">
                <a href="#!" class="cancelar modal-close waves-effect waves-green green accent-2 black-text btn">Eliminar de todos modos</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Me lo he pensado mejor</a>
            </div>
        </div>

        <div id="modal2" class="modal center-align">
            <div class="modal-content center-align orange darken-4">
                <h4>¿Estás seguro de que quieres abandonar la pachanga?</h4>
                <h5>Podrás volver a apuntarte más adelante si aún quedan plazas libres.</h5>
            </div>
            <div class="modal-footer orange darken-4">
                <a href="#!" class="abandonar modal-close waves-effect waves-green green accent-2 black-text btn">Abandonar la pachanga</a>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Me lo he pensado mejor</a>
            </div>
        </div>    
    </div>

    <?php $opc="pachangas";require_once("../controlador/paginacion_controlador.php");  ?>
  
</div>

<script>
    $(document).ready(function(){
        $('.baja').on("click", function(e){
            e.preventDefault();
            var idp = $(this).data("id_pachanga");
            $(".abandonar").data("id_pachanga",idp);                                        
        });

        $('.abandonar').on("click", function(e){
            e.preventDefault();

            $.ajax({
                url: "../controlador/botones_controlador.php",
                type: "post",
                data: {accion: "abandonar",idp: $(this).data("id_pachanga"),usuario: <?php echo $_SESSION["id"];?>,correo: <?php echo "'" . $_SESSION["usuario"] . "'";?>},
                beforeSend: function() {
                    $("#loading").show();
                },
                success: function(respuesta) {
                    location.reload(); 
                }
            });                             
        });

        $('.cancel').on("click", function(e){
            e.preventDefault();
            var idp = $(this).data("id_pachanga");
            $(".cancelar").data("id_pachanga",idp);                                        
        });

        $('.cancelar').on("click", function(e){
            e.preventDefault();       
            $.ajax({
                url: "../controlador/botones_controlador.php",
                type: "post",
                data: {accion: "cancelar",idp: $(this).data("id_pachanga")},
                beforeSend: function() {
                    $("#loading").show();
                },
                success: function(respuesta) {                  
                    location.reload();
                }
            });                           
        });

        $('.cerrar').on("click", function(e){
            e.preventDefault();

            $.ajax({
                url: "../controlador/botones_controlador.php",
                type: "post",
                data: {accion: "cerrar",idp: $(this).data("id_pachanga")},
                beforeSend: function() {
                    $("#loading").show();
                },                
                success: function(respuesta) {
                    location.reload();
                }
            });                             
        });

        $('.reabrir').on("click", function(e){
            e.preventDefault();

            $.ajax({
                url: "../controlador/botones_controlador.php",
                type: "post",
                data: {accion: "reabrir",idp: $(this).data("id_pachanga")},
                beforeSend: function() {
                    $("#loading").show();
                },
                success: function(respuesta) {
                    location.reload();
                }
            });                             
        });

        $('.modificar').on("click", function(e){

            $.ajax({
                url: "../controlador/modificar_pachanga_controlador.php",
                type: "post",
                data: {idp: $(this).data("id_pachanga")},
                success: function(respuesta) {
                    location.href = "modificar_pachanga.php";
                }
            });                             
        });

        $('.modal').modal();
    })
</script>

<?php include("footer_privado.php"); ?>