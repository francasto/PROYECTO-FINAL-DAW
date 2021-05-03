<?php include("header_privado.php"); ?>
<?php require_once("../controlador/actualizar_perfil_controlador.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Edita tu perfil</h2>
            <br><br>                       
        </div>
        <div class="row">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                <table class="col s6 centered offset-s3 fondogris white-text">
                    <tr>
                        <th>Foto de perfil:</th>
                        <td><img src="<?php echo $perfil->get_foto_perfil(); ?>" alt="foto de perfil" class="responsive-img col s4 circle"><br><br>
                        <input type="file" onclick="M.toast({html: 'Formatos admitidos: jpeg, jpg y png. Tamaño máximo 512kb.'})" name="imagen" class="col s8 valign-wrapper" accept=".jpeg,.jpg,.png"></td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td><input type="text" id="nombre" name="nombre" class="validate white-text center-align" value=<?php echo "'" . $perfil->get_nombre() . "'"; ?> required></td>
                    </tr>
                    <tr>
                        <th>Primer apellido:</th>
                        <td><input type="text" id="apellido1" name="apellido1" class="validate white-text center-align" value=<?php echo "'" . $perfil->get_apellido1() . "'"; ?> required></td>
                    </tr>
                    <tr>
                        <th>Segundo apellido:</th>
                        <td><input type="text" id="apellido2" name="apellido2" class="validate white-text center-align" value=<?php echo "'" . $perfil->get_apellido2() . "'"; ?> required></td>
                    </tr>
                    <tr>
                        <th>Teléfono:</th>
                        <td><input type="tel" id="tel" name="tel" class="validate white-text center-align" pattern="[0-9]{9}" value=<?php echo "'" . $perfil->get_movil() . "'"; ?> required></td>
                    </tr>
                    <tr>
                        <th>Nombre de fútbol:</th>
                        <td><input type="text" id="apodo" name="apodo" class="validate white-text center-align" value=<?php echo "'" . $perfil->get_apodo() . "'"; ?> required></td>
                    </tr>
                </table> 
                <div class="row col s12 center-align">
                    <br>
                    <button class="btn" type="submit" name="actualizar" id="actualizar">Actualizar</button> 
                </div>
            </form>
                      
        </div>
        
    </div>

<?php include("footer_privado.php"); ?>