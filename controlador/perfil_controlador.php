<?php   
    require_once("../modelo/perfil_modelo.php");

    $perfil=new Perfil_modelo();
    $perfil->get_perfil();
?>