<?php   
    require_once("../modelo/actualizar_perfil_modelo.php");

    $perfil=new Actualizar_perfil_modelo();
    $perfil->get_perfil();
    $perfil->actualizar();
?>