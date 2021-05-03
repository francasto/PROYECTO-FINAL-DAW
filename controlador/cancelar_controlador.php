<?php   
    require_once("../modelo/pachangas_modelo.php");

    $pachanga=new Pachangas_modelo();

    if(isset($_POST["idp"])) {
        $pachanga->cancelar($_POST["idp"]);        
    }
?>