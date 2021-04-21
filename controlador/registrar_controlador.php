<?php
    require_once("../modelo/registro_modelo.php");
    require_once("../modelo/mail_modelo.php");
    

    $usuario=new Registro_modelo();
    $existe=$usuario->get_registrado();

    if($existe == 0) {
        $texto=include("../vista/correo_bienvenida.php");
        $email=new Mail_modelo($_POST["email"],"Bienvenido a Pachangas PRO",$texto);
        $email->enviar_mail();
        $usuario->set_registro();
        session_start();
        $_SESSION["usuario"]=$_POST["email"];
        header("location:../vista/pachangas.php");
    } else {
        setcookie("existe", "El usuario ya está registrado.", time() + (60*60*24*90), "/");
        header("location:../vista/registro.php");
    }

    require_once("../vista/registro.php");
?>