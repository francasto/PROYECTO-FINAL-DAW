<?php   
    require_once("../modelo/pachangas_modelo.php");

    $pachanga=new Pachangas_modelo();
    $pachanga->get_pachangas();

?>