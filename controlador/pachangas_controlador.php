<?php   
    require_once("../modelo/pachangas_modelo.php");

    $pachanga=new Pachangas_modelo();
    $pachanga->get_pachangas(); 
    echo $_POST["idp"];
    if(isset($_POST["idp"])) {
        echo "<h1>estamos llegando</h1>";
        $pachanga->abandonar($_POST["idp"]);
    }
?>