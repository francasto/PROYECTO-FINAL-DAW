<?php   
    require_once("../modelo/conectar.php");

    class Registro_modelo {
        private $db;
        private $reg;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->reg=0;

        }

        public function get_registrado() {
            $correo=htmlentities(addslashes($_POST["email"]));
            $pw=htmlentities(addslashes($_POST["pw"]));
            $sql="select * from jugadores where email = '" . $correo . "'";
            $consulta=$this->db->query($sql);
            $this->reg=$consulta->rowCount();

            return $this->reg;
        }

        public function set_registro() {
            $nombre=htmlentities(addslashes($_POST["nombre"]));
            $apellido1=htmlentities(addslashes($_POST["apellido1"]));
            $apellido2=htmlentities(addslashes($_POST["apellido2"]));
            $tel=htmlentities(addslashes($_POST["tel"]));
            $correo=htmlentities(addslashes($_POST["email"]));
            $pw=htmlentities(addslashes($_POST["pw"]));
            $foto="../img/perfil.jpg";
            $apodo="El pelusa";
            $pw=password_hash($pw, PASSWORD_DEFAULT);
            $token = md5($correo . time() . rand(1000,9999));
            $sql="insert into jugadores (nombre, apellido1, apellido2, email, movil, password, foto, apodo, token) values ('" . $nombre . "','" . $apellido1 . "','" . $apellido2 . "','" . 
            $correo . "','" . $tel . "','" . $pw . "','" . $foto . "','" . $apodo . "','" . $token . "');";
            $consulta=$this->db->query($sql);

            return $consulta;
        }

        public function get_id($correo) {
            $id_usuario = "";

            $consulta=$this->db->query("select id_usuario from jugadores where email = '" . $correo . "'");
            while($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $id_usuario=$fila["id_usuario"];
            }

            return $id_usuario;
        }
    }
?>