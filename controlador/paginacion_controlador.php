<?php   
    require_once("../modelo/paginacion_modelo.php");

    $pag=new Paginacion_modelo();
    $pag->get_paginacion(); 
?>