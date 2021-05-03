<?php 
    require_once("../modelo/conectar.php");

    class Perfil_modelo {
        private $db;
        private $foto_pefil;
        private $nombre;
        private $primer_apellido;
        private $segundo_apellido;
        private $correo;
        private $telefono;
        private $nombre_futbol;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->foto_perfil = "../img/perfil.jpg";
            $this->nombre = "";
            $this->primer_apellido = "";
            $this->segundo_apellido = "";
            $this->correo = "";
            $this->telefono = "";
            $this->nombre_futbol = "El pelusa";
        }

        public function get_perfil() {
            $consulta = $this->db->query("SELECT * FROM jugadores WHERE id_usuario = " . $_SESSION["id"]);
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->foto_perfil = $filas["foto"];
                $this->nombre = $filas["nombre"];
                $this->primer_apellido = $filas["apellido1"];
                $this->segundo_apellido = $filas["apellido2"];
                $this->correo = $filas["email"];
                $this->telefono = $filas["movil"];
                $this->nombre_futbol = $filas["apodo"];                
            }               
        }

        public function get_nombre() {
            return $this->nombre;
        }

        public function get_apellido1() {
            return $this->primer_apellido;
        }

        public function get_apellido2() {
            return $this->segundo_apellido;
        }

        public function get_email() {
            return $this->correo;
        }

        public function get_movil() {
            return $this->telefono;
        }

        public function get_apodo() {
            return $this->nombre_futbol;
        }

        public function get_foto_perfil() {
            if($this->foto_perfil == "") {
                return "../img/fotos_perfil/error.png";
            } else {
                return $this->foto_perfil;
            }            
        }
    }
?>