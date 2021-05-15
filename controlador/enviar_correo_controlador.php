<?php   
    require_once("../modelo/enviar_correo_modelo.php");

    $correo=new Enviar_correo_modelo();

    switch($opcion) {
        case "bienvenida":
            $correo->bienvenida($email);
            break;
        case "apuntado":
            $correo->apuntado($email):
            break;
        case "borrado":
            $correo->borrado($email):
            break;
        case "modificada":
            $correo->modificada($email):
            break;
        case "cancelada":
            $correo->cancelada($email);
            break;
        case "password":
            $correo->password($email);
            break;
    }
?>