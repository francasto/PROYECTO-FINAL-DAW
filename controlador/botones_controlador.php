<?php   
    require_once("../modelo/pachangas_modelo.php");

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
            break;
        case "cancelar":
            $pachanga->cancelar($_POST["idp"]);
            break;
    }
?>