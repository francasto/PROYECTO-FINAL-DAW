<?php
    require_once("../modelo/login_modelo.php");

    $login=new Login_modelo();
    $reg=$login->get_reg();
    $contra = "";
    $id_usuario = "";
    
    if($reg->rowCount() > 0) {
        while($fila=$reg->fetch(PDO::FETCH_ASSOC)) {
            $contra=$fila["password"];
            $id_usuario=$fila["id_usuario"];
        }



        if(password_verify($_POST["password"], $contra)) {
            session_start();
            $_SESSION["usuario"]=$_POST["email"];
            $_SESSION["id"]=$id_usuario;
            header("location:../vista/pachangas.php");
        } else {
            setcookie("error", "Contraseña incorrecta.", time() + (60*60*24*90), "/");
            header("location:../vista/login.php");
        }        
    } else {
        setcookie("error", "Usuario incorrecto.", time() + (60*60*24*90), "/");
        header("location:../vista/login.php");
    }
?>