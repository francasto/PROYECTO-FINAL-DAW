<?php 
    require_once("../modelo/conectar.php");

    class Paginacion_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_paginacion() {
            $reg_por_pag = 4;
            if(isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
                /*if($_GET["pagina"] == 1) {
                    header("Location:pachangas.php");
                } else {
                    $pagina = $_GET["pagina"];
                }*/
            } else {
                $pagina = 1;
            }

            $c = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario= par.id_usuario_partido
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"]);

            $total_reg = $c->rowCount();

            $total_paginas = ceil($total_reg / $reg_por_pag);

            if($pagina > 1) {
                $anterior = $pagina - 1;
            } else {
                $anterior = $pagina;
            }

            if($pagina < $total_paginas) {
                $siguiente = $pagina + 1;
            } else {
                $pagina = $pagina - 1;
            }
            
            $siguiente = $pagina + 1;

            echo "
                <div class='row center-align'>
                    <ul class='pagination'>
                    <li class='waves-effect'><a href='?pagina=" . $anterior . "'><i class='material-icons'>chevron_left</i></a></li>";
                    for($i = 1; $i <= $total_paginas; $i++) {
                        echo "<li class='waves-effect'><a href='?pagina=" . $i . "'>" . $i . "</a></li>";
                    }
            echo "
                        <li class='waves-effect'><a href='?pagina=" . $siguiente . "'><i class='material-icons'>chevron_right</i></a></li>
                    </ul>
                </div>";
            
        }
    }
?>