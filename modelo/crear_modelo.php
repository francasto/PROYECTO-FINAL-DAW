<?php   
    require_once("../modelo/conectar.php");

    class Crear_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();

        }

        public function set_pachanga() {
            $fecha=htmlentities(addslashes($_POST["fecha"]));
            $hora=htmlentities(addslashes($_POST["hora"]));
            $pabellon=htmlentities(addslashes($_POST["pabellon"]));
            $precio=htmlentities(addslashes($_POST["precio"]));
            $codigo=htmlentities(addslashes($_POST["visibilidad"]));
            $id=htmlentities(addslashes($_POST["id_creador"]));
            $participantes=htmlentities(addslashes($_POST["participantes"]));
            $sql="insert into pachangas (fecha, hora, id_pabellon, precio, codigo_pachanga, id_creador, participantes) values ('" . $fecha . "','" . $hora . "','" . $pabellon . "','" . 
            $precio . "','" . $codigo . "','" . $id . "','" . $participantes . "');";
            $this->db->query($sql);
            $this->apuntar($id);
            header("location:../vista/pachangas.php");
        }

        public function apuntar($id) {           
            $consulta=$this->db->query("SELECT DISTINCT p.id_pachanga FROM pachangas p LEFT JOIN partidos par ON p.id_pachanga = par.id_pachanga_partido 
            WHERE p.id_creador = " . $id . " AND par.id_usuario_partido IS NULL");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $sql="insert into partidos (id_usuario_partido, id_pachanga_partido) values ('" . $id . "','" . $filas["id_pachanga"] . "');";
                $this->db->query($sql);
            }
        }
    }
?>