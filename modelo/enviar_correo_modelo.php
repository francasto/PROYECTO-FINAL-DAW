<?php
    require_once("../modelo/conectar.php");
    require_once("../modelo/mail_modelo.php");

    class Enviar_correo_modelo {
        private $db;
        private $destino;
        private $asunto;
        private $contenido;
        private $cabecera;   

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->destino="";
            $this->asunto="";
            $this->contenido="";
            $this->cabecera = "MIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n"; ;
        }
    
        public function enviar_mail() {   
            mail($this->destino,$this->asunto,$this->contenido,$this->cabecera);             
        }

        public function bienvenida($correo) {
            $texto="<div style='background-color:#e65100; padding:20px; width:1024px; height:400px; text-align:center'>";
            $texto.="<img src='ruta_del_logo' alt='Aquí irá el logo cuando lo suba al servidor.'>";
            $texto.="<h1>Bienvenido a Pachangas PRO</h1>";
            $texto.="<h3>Todo un mundo de pachangas al alcance de la mano.</h3>";
            $texto.="<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.="</div>";
        
            $this->contenido = $texto;
            $this->destino = $correo;
            $this->asundo = "Bienvenido a Pachangas PRO";

            $this->enviar_mail();
        }

    }








        public function enviar_correo($correo) {
            if($this->comprobar($correo)) {
                $token = $this->genera_token($correo);                
                $link = "http://localhost/vista/recuperar_contrasena.php?c=" . $correo . "&t=" . $token;
                $asunto = "Reestablecer contraseña de Pachangas PRO";
                $texto = "<div style='background-color:#e65100; padding:20px; width:1024px; height:400px; text-align:center'>";
                $texto.= "<img src='ruta_del_logo' alt='Aquí irá el logo cuando lo suba al servidor.'>";
                $texto.= "<h1>Pachangas PRO</h1>";
                $texto.= "<h3>Aquí podrás reestablecer tu contraseña.</h3>";
                $texto.= "<p>Se ha recibido la solicitud de reestablecimiento de contraseña.";
                $texto.= " Para reestablecer tu contraseña haz clic en el link siguiente: <a href='" . $link . "' style='color:black;'>Reestablecer contraseña.</a> </p>";
                $texto.= "<p>O copia y pega la URL en tu navegador: " . $link . "</p>";
                $texto.= "<p>Si no has solicitado el reseteo de tu contraseña, simplemente ignora este mensaje.</p>";
                $texto.= "</div>";
                $restablecer = new Mail_modelo($correo,$asunto,$texto);
                $restablecer->enviar_mail();
                echo "1";
            } else {
                echo "0";
            }
        }

        public function comprobar($correo) {
            $consulta = $this->db->query("SELECT * FROM jugadores WHERE email = '" . $correo . "'");
            if($consulta->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function genera_token($correo) {
            $token = md5($correo . time() . rand(1000,9999));
            $consulta = $this->db->query("UPDATE jugadores SET token = '" . $token . "' where email = '" . $correo . "'");
            return $token;
        }

        public function comprobar_token($correo, $token) {
            $consulta = $this->db->query("SELECT * FROM jugadores WHERE email = '" . $correo . "' AND token = '" . $token . "'");
            if($consulta->rowCount() > 0) {
                echo "1";
            } else {
                echo "0";
            }
        }

        public function cambiar($email, $pw, $token) {                            
            $npw = password_hash($pw, PASSWORD_DEFAULT);
            $sql = "UPDATE jugadores SET password = '" . $npw . "' where email = '" . $email . "' AND token = '" . $token . "'";
            $consulta = $this->db->query($sql);
            if($consulta->rowCount() > 0) {
                $this->genera_token($email);
                header('Location: ../vista/login.php');
            }           
        }
    }
?>
