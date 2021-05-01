<?php   
    require_once("../modelo/buscar_modelo.php");

    $b=new Buscar_modelo();

    if(isset($_POST["idp"]) and isset($_POST["usuario"])) {
        $b->apuntarse($_POST["idp"],$_POST["usuario"]);        
    }
?>