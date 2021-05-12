<?php   
    require_once("../modelo/cambiar_contrasena_modelo.php");

    $pw=new Cambiar_contrasena_modelo();
    $pw->get_pw();
    if(isset($_POST["cambiar"])) {
        $pw->cambiar();
    }
?>