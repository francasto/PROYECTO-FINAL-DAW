<?php   
    require_once("../modelo/recuperar_contrasena_modelo.php");

    $npw=new Recuperar_contrasena_modelo();

    if(isset($_POST["correo"])) {
        $correo = htmlentities(addslashes($_POST["correo"]));
        $npw->enviar_correo($correo);
        
    }    
        
    if(isset($_POST["pw"]) && isset($_POST["email"])) {
        $email = htmlentities(addslashes($_POST["email"]));
        $pw = htmlentities(addslashes($_POST["pw"]));
        $token = htmlentities(addslashes($_POST["token"]));
        $npw->cambiar($email, $pw, $token);
    } 

    if(isset($_POST["email"]) && isset($_POST["token"])) {
        $email = $_POST["email"];
        $token = $_POST["token"];
        $npw->comprobar_token($email, $token);
    }
?>