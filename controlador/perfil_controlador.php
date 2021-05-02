<?php   
    require_once("../modelo/perfil_modelo.php");

    $perfil=new Perfil_modelo();
    $perfil->get_perfil();

    require_once("../vista/login_vista.php");
?>