<?php 
    require_once("../modelo/conectar.php");

    class Cambiar_contrasena_modelo {
        private $db;
        private $pass;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->pass = "";
        }

        public function get_pw($idp) {
            $consulta = $this->db->query("SELECT * FROM jugadores WHERE id_usuario = " . $idp);
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->pass = $filas["password"];                
            }               
        }

        public function cambiar($idp) {                            
            $pw = htmlentities(addslashes($_POST["pw"]));
            $npw = htmlentities(addslashes($_POST["npw"]));

            if(password_verify($pw, $this->pass)) {
                $npw=password_hash($npw, PASSWORD_DEFAULT);
                $sql = "UPDATE jugadores SET password = '" . $npw . "' where id_usuario = " . $idp;
                $consulta = $this->db->query($sql);
                echo "Contraseña cambiada satisfactoriamente.";
            } else {
                echo "0"; 
            }                        
        }
    }
?>
