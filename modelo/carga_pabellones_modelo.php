<?php   
    require_once("../modelo/conectar.php");

    class Carga_pabellones_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_pabellones() {
            $consulta=$this->db->query("select * from pabellones where id_creador = '" . $_SESSION["id"] . "'");
            if($consulta->rowCount() > 0) {
                while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $filas["id_pabellon"] . "'>" . $filas["nombre_pab"] . ". " . $filas["localidad"] . "</option>";
                }
            }
            
        }

    }
?>