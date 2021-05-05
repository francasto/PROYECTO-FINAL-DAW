<?php 
    require_once("../modelo/conectar.php");

    class Modificar_pachanga_modelo {
        private $db;
        private $lugar;
        private $fecha;
        private $hora;
        private $precio;
        private $participantes;
        private $clave;
        private $idp;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->lugar = "";
            $this->fecha = "";
            $this->hora = "";
            $this->precio = "";
            $this->participantes = "";
            $this->clave = "";
            $this->idp = "";
        }

        public function get_pachanga($idp) {
            $consulta = $this->db->query("SELECT * FROM jugadores j INNER JOIN  pachangas p ON j.id_usuario= p.id_creador
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE p.id_pachanga = " . $idp);
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                //$this->lugar = $filas["añskjf"];
                $this->fecha = $filas["fecha"];
                $this->hora = $filas["hora"];
                $this->precio = $filas["precio"];
                $this->participantes = $filas["participantes"];
                $this->clave = $filas["codigo_pachanga"]; 
                $this->idp = $filas["id_pachanga"];              
            }               
        }

        public function get_lugar() {
            return $this->lugar;           
        }

        public function get_fecha() {
            return $this->fecha;
        }

        public function get_hora() {
            return $this->hora;
        }

        public function get_precio() {
            return $this->precio;
        }

        public function get_participantes() {
            return $this->participantes;
        }

        public function get_clave() {
            return $this->clave;
        }

        public function get_idp() {
            return $this->idp;
        }

        public function set_pachanga($idp) {
            $fecha=htmlentities(addslashes($_POST["fecha"]));
            $hora=htmlentities(addslashes($_POST["hora"]));
            $pabellon=htmlentities(addslashes($_POST["pabellon"]));
            $precio=htmlentities(addslashes($_POST["precio"]));
            $codigo=htmlentities(addslashes($_POST["visibilidad"]));
            $participantes=htmlentities(addslashes($_POST["participantes"]));
            $sql="UPDATE pachangas SET fecha = '". $fecha . "', hora = '" . $hora . "', id_pabellon = '" . $pabellon . 
            "', precio = '" . $precio . "', visibilidad = '" . $codigo . "', participantes = '" . $participantes . "' where id_pachanga = " . $idp;
            $this->db->query($sql);
            header("location:../vista/pachangas.php");            
        }
    }
?>