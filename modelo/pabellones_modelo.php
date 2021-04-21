<?php   
    require_once("../modelo/conectar.php");

    class Pabellones_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function set_pabellon() {
            $nombre=htmlentities(addslashes($_POST["nombre"]));
            $direccion=htmlentities(addslashes($_POST["direccion"]));
            $localidad=htmlentities(addslashes($_POST["localidad"]));
            $tel=htmlentities(addslashes($_POST["tel"]));
            $id_creador=htmlentities(addslashes($_POST["id_creador"]));
            $sql="insert into pabellones (nombre_pab, direccion, localidad, telefono, id_creador) values ('" . $nombre . "','" . $direccion . "','" . $localidad . "','" . 
            $tel . "','" . $id_creador . "');";
            $consulta=$this->db->query($sql);
        }
    }
?>