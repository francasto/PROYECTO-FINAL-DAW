<?php   
    require_once("../modelo/pachangas_modelo.php");

    $pachanga=new Pachangas_modelo();

    if(isset($_POST["idp"]) and isset($_POST["usuario"])) {
        $pachanga->abandonar($_POST["idp"],$_POST["usuario"]);        
    }
?>