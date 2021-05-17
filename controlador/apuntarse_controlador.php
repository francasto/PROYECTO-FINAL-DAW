<?php   
    require_once("../modelo/buscar_modelo.php");
    require_once("../modelo/enviar_correo_modelo.php");

    $b=new Buscar_modelo();

    if(isset($_POST["idp"]) and isset($_POST["usuario"])) {
        $b->apuntarse($_POST["idp"],$_POST["usuario"]); 
        $email=new Enviar_correo_modelo($_POST["correo"]);
        $email->apuntado($_POST["idp"]);       
    }
?>