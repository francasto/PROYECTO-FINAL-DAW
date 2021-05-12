<?php 
    require_once("../modelo/conectar.php");

    class Cambiar_contrasena_modelo {
        private $db;
        private $pass;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->pass = "";
        }

        public function get_pw() {
            $consulta = $this->db->query("SELECT * FROM jugadores WHERE id_usuario = " . $_SESSION["id"]);
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->pass = $filas["password"];                
            }               
        }

        public function cambiar() {                            
            $pw = htmlentities(addslashes($_POST["pw"]));
            $npw = htmlentities(addslashes($_POST["npw"]));
            $npw2 = htmlentities(addslashes($_POST["npw2"]));

            if(password_verify($pw, $this->pass)) {
                if($npw === $npw2) {
                    $npw=password_hash($npw, PASSWORD_DEFAULT);
                    $sql = "UPDATE jugadores SET password = '" . $npw . "' where id_usuario = " . $_SESSION["id"];
                    $consulta = $this->db->query($sql);
                    header("Location:perfil.php");
                } else {
                    return "La nueva contraseña no coincide.";
                }                
            } else {
                return "La contraseña introducida no se corresponde con la almacenada en la base de datos.";
            }            
        }
    }
?>
