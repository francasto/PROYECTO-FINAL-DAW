<?php   
    require_once("../modelo/pachangas_modelo.php");
    require_once("../modelo/enviar_correo_modelo.php");

    $pachanga=new Pachangas_modelo();

    switch($_POST["accion"]) {
        case "cerrar":
            $pachanga->cerrar($_POST["idp"]);
            break;
        case "reabrir":
            $pachanga->reabrir($_POST["idp"]);
            break;
        case "abandonar":
            $pachanga->abandonar($_POST["idp"],$_POST["usuario"]);
            $email=new Enviar_correo_modelo($_POST["correo"]);
            $email->borrado($_POST["idp"]);
            break;
        case "cancelar":            
            $email=new Enviar_correo_modelo("");
            $email->cancelada($_POST["idp"]);
            $pachanga->cancelar($_POST["idp"]);
            break;
    }
?>