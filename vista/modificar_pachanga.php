<?php include("header_privado.php"); ?>
<?php require_once("../controlador/modificar_pachanga_controlador.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Modificar pachangas</h2>
            <h6>Modifica los datos de tu pachanga.</h6>
            <br><br>
            <div class="row center-align" id="loading">
                <img src="../img/logo.png" alt="cargando" class="cargando">
                <h4 class="carga center-align">CARGANDO</h4>
            </div>
            <div class="col s12 m12 l6 offset-l3">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col s12" method="post" accept-charset="UTF-8">
                    <div class="row card-panel">
                        <div class="input-field col s10">
                            <select id="pabellon" name="pabellon" class="validate browser-default" required>
                                <?php require_once("../controlador/carga_pabellones_controlador.php"); ?>
                            </select>
                        </div>
                        <div class="input-field col s2">
                            <a href="pabellones.php" class="waves-effect waves-light btn">Nuevo</a>
                        </div>
                        <div class="input-field col s6">
                            <input type="date" id="fecha" name="fecha" class="validate" value=<?php echo "'" . $pach->get_fecha() . "'"; ?> required>
                            <label for="fecha">Fecha:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="time" id="hora" name="hora" class="validate" value=<?php $hour = new DateTime($pach->get_hora()); echo "'" . $hour->format('H:i') . "'"; ?> required>
                            <label for="hora">Hora:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" id="precio" name="precio" class="validate" value=<?php echo "'" . $pach->get_precio() . "'"; ?> min=0 step=".01" required>
                            <label for="precio">Precio:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" id="participantes" name="participantes" class="validate" value=<?php echo "'" . $pach->get_participantes() . "'"; ?> min=1 required>
                            <label for="participantes">Participantes:</label>
                        </div>
                        <div class="input-field col s12"> 
                            <p class="col s12">
                                <label>
                                    <input class="with-gap" id="publico" name="visibilidad" type="radio" value="000000" checked>
                                    <span>Pachanga pública</span>
                                </label>
                            </p>                       
                            <p class="col s6">
                                <label>
                                    <input class="with-gap" id="privado" name="visibilidad" type="radio" value="">
                                    <span>Pachanga privada</span>
                                </label>
                            </p>
                            <div class="input-field col s6" id="campoClave">
                                <input type="text" id="clave" name="clave" class="validate" placeholder="De 6 a 12 caracteres" pattern="[A-Za-z0-9]{6,12}" value=<?php echo "'" . $pach->get_clave() . "'"; ?>>
                                <label for="clave">Clave de la pachanga:</label>
                            </div> 
                            <div class="input-field col s12">
                                <input type="hidden" id="idp" name="idp" value="<?php echo $pach->get_idp(); ?>">
                            </div>                           
                        </div>                      
            
                        <button id="modificar" name="modificar" class="btn" type="submit">Modificar pachanga</button>
                    </div>
                </form>
            </div>              
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#campoClave").hide();

            if(<?php echo "'" . $pach->get_clave() . "'"; ?> == '000000') {
                $("#publico").attr("checked", true);
                $("#clave").val("");
            } else {
                $("#privado").attr("checked", true);
                $("#campoClave").show();
            }

            $("#pabellon option[value=<?php echo $pach->get_lugar(); ?>]").attr("selected", true);

            $('#privado').on("click", function(){
                var c = document.getElementById("privado").checked;
                if (c) {                    
                    $("#campoClave").show();
                    $("#clave").attr("required", true);
                }
            });

            $('#publico').on("click", function(){
                var d = document.getElementById("publico").checked;
                if (d) {
                    $("#campoClave").hide();
                    $("#clave").attr("required", false);
                }
            });

            $('#clave').on("blur", function(){
                $("#privado").val($("#clave").val());
            });

            $('form').on("submit", function(){
                $("#loading").show();                             
            });


            var hoy = new Date();
            var dd = hoy.getDate() + 1;
            var mm = hoy.getMonth() + 1; 
            var yyyy = hoy.getFullYear();
            if(dd < 10){
                dd = '0' + dd
            } 
            if(mm < 10){
                mm = '0' + mm
            } 
            hoy = yyyy + '-' + mm + '-' + dd;
            $("#fecha").attr("min", hoy);

        })
    </script>

<?php include("footer_privado.php"); ?>