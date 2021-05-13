<?php   
    require_once("../modelo/cambiar_contrasena_modelo.php");

    $pw=new Cambiar_contrasena_modelo();

        if(!empty($_POST["pw"]) && !empty($_POST["npw"])) {
            $pw->get_pw($_POST["idp"]);
            $pw->cambiar($_POST["idp"]);
        } 
?>