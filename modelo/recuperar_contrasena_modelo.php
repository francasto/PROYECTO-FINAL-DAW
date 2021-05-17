<?php 
    require_once("../modelo/conectar.php");
    require_once("../modelo/enviar_correo_modelo.php");

    class Recuperar_contrasena_modelo {
        private $db;    

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function enviar_correo($correo) {
            if($this->comprobar($correo)) {
                $token = $this->genera_token($correo);                
                $link = "http://localhost/vista/recuperar_contrasena.php?c=" . $correo . "&t=" . $token;
                $restablecer = new Enviar_correo_modelo($correo);
                $restablecer->password($link);
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
