<?php   
    require_once("../modelo/modificar_pachanga_modelo.php");

    $idp = $_POST["idp"];

    $pach=new Modificar_pachanga_modelo();

    $pach->get_pachanga($idp);
    
    if(isset($_POST["actualizar"])) {
        $pach->set_pachanga($idp);
    }
    
?>