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
                    <td><img src="../img/perfil.jpg" alt="foto de perfil" class="responsive-img col s4 offset-s4 circle"></td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td><?php $perfil->nombre ?></td>
                </tr>
                <tr>
                    <th>Primer apellido:</th>
                    <td>Gafotas</td>
                </tr>
                <tr>
                    <th>Segundo apellido:</th>
                    <td>Otro</td>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <td>mangaf@gmail.com</td>
                </tr>
                <tr>
                    <th>Teléfono:</th>
                    <td>654654654</td>
                </tr>
                <tr>
                    <th>Nombre de fútbol:</th>
                    <td>El pelusa</td>
                </tr>
            </table>            
        </div>
        <div class="row center-align">
            <button class="btn">Actualizar</button>
        </div>
    </div>

<?php include("footer_privado.php"); ?>