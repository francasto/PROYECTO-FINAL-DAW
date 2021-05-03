<?php include("header_privado.php"); ?>
<?php require_once("../controlador/perfil_controlador.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Perfil de usuario</h2>
            <h6>Aquí podrás consultar y modificar tu perfil de usuario.</h6>
            <br><br>                       
        </div>
        <div class="row">
            <table class="col s6 centered offset-s3 fondogris white-text">
                <tr>
                    <th>Foto de perfil:</th>
                    <td><img src="<?php echo $perfil->get_foto_perfil(); ?>" alt="foto de perfil" class="responsive-img col s4 offset-s4 circle"></td>                    
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td><?php echo $perfil->get_nombre(); ?></td>
                </tr>
                <tr>
                    <th>Primer apellido:</th>
                    <td><?php echo $perfil->get_apellido1(); ?></td>
                </tr>
                <tr>
                    <th>Segundo apellido:</th>
                    <td><?php echo $perfil->get_apellido2(); ?></td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td><?php echo $perfil->get_email(); ?></td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td><?php echo $perfil->get_movil(); ?></td>
                </tr>
                <tr>
                    <th>Nombre de fútbol:</th>
                    <td><?php echo $perfil->get_apodo(); ?></td>
                </tr>
            </table>            
        </div>
        <div class="row center-align">
            <a href="actualizar_perfil.php" class="btn">Editar perfil</a>
        </div>
    </div>

<?php include("footer_privado.php"); ?>