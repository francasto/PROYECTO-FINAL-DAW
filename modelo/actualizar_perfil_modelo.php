<?php 
    require_once("../modelo/conectar.php");

    class Actualizar_perfil_modelo {
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
            $this->foto_perfil = "";
            $this->nombre = "";
            $this->primer_apellido = "";
            $this->segundo_apellido = "";
            $this->correo = "";
            $this->telefono = "";
            $this->nombre_futbol = "";
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

        public function get_foto_perfil() {
            if($this->foto_perfil == "") {
                return "../img/fotos_perfil/error.png";
            } else {
                return $this->foto_perfil;
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

        public function actualizar() {            
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamano_imagen = $_FILES['imagen']['size'];

            if($nombre_imagen != "") {
                if($tamano_imagen <= 524288 && ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png")) {
                    $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                    $nombre_imagen = $this->get_email() . "." . $ext;
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . "/img/fotos_perfil/";
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);
                    $foto = "../img/fotos_perfil/" . $nombre_imagen;
                } else {
                    echo "Imágen no válida. Debe ser igual o menor a 512kb y los formatos admitidos son jpg, jpeg y png.";
                }
                
            } else {
                $foto = $this->get_foto_perfil();
            }            

            $nombre = htmlentities(addslashes($_POST["nombre"]));
            $apellido1 = htmlentities(addslashes($_POST["apellido1"]));
            $apellido2 = htmlentities(addslashes($_POST["apellido2"]));
            $tel = htmlentities(addslashes($_POST["tel"]));                
            $apodo = htmlentities(addslashes($_POST["apodo"]));
            $sql="UPDATE jugadores SET nombre = '". $nombre . "', apellido1 = '" . $apellido1 . "', apellido2 = '" . $apellido2 . 
            "', movil = '" . $tel . "', foto = '" . $foto . "', apodo = '" . $apodo . "' where id_usuario = " . $_SESSION["id"];
            $consulta=$this->db->query($sql);
            header("Location:perfil.php");
        }
    }
?>