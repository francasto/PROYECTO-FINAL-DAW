<?php
    require_once("../modelo/registro_modelo.php");
    require_once("../modelo/enviar_correo_modelo.php");
    

    $usuario = new Registro_modelo();
    $existe = $usuario->get_registrado();

    if($existe == 0) {
        $texto=include("../vista/correo_bienvenida.php");
        $email=new Enviar_correo_modelo($_POST["email"]);
        $email->bienvenida();
        $usuario->set_registro();
        $id = $usuario->get_id($_POST["email"]);
        session_start();
        $_SESSION["usuario"] = $_POST["email"];
        $_SESSION["id"] = $id;
        header("location:../vista/pachangas.php");
    } else {
        setcookie("existe", "El usuario ya está registrado.", time() + (60*60*24*90), "/");
        header("location:../vista/registro.php");
    }

    require_once("../vista/registro.php");
?>