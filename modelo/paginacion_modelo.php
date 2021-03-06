<?php 
    require_once("../modelo/conectar.php");
    require_once("../modelo/pachangas_modelo.php");
    require_once("../modelo/buscar_modelo.php");

    class Paginacion_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_paginacion($opc) {
            
            $reg_por_pag = 4;
            if(isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }

            switch ($opc) {
                case "pachangas":
                    $pacha = new Pachangas_modelo();
                    $total_reg = $pacha->get_recuento();
                    $mensaje = "<h3 class='center-align'>Actualmente no estás inscrito en ninguna pachanga.</h3>";
                    break;
                case "buscar":
                    $bus = new Buscar_modelo();
                    $total_reg = $bus->get_recuento();
                    $mensaje = "";
                    break;
                case "historial":
                    $his = new Historial_modelo();
                    $total_reg = $his->get_recuento();
                    $mensaje = "<h3 class='center-align'>Actualmente no tienes ninguna pachanga en tu historial.</h3>";
            }           
            
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

            if($total_reg > 0) {
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
            }  else {
                echo $mensaje;
            }            
            
        }
    }
?>