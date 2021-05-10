<?php   
    require_once("../modelo/historial_modelo.php");

    $historico=new Historial_modelo();
    $historico->get_historial(); 
?>