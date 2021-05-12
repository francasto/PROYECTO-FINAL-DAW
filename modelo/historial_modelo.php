<?php
    require_once("../modelo/conectar.php");

    class Historial_modelo {
        private $db;
        private $fecha;
        private $hora;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->fecha = date("Y-m-d");
            $this->hora = date("H:i:s");
        }

        public function get_historial() {
            $reg_por_pag = 4;
            if(isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }

            $inicio = ($pagina - 1) * $reg_por_pag;

            $mostrar = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"] . " AND (p.fecha < '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora < '" . $this->hora . "'))
            ORDER BY fecha, hora ASC LIMIT " . $inicio . "," . $reg_por_pag);
            if($mostrar->rowCount() > 0) {
                while($filas=$mostrar->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime($filas["fecha"]);
                    $hour = new DateTime($filas["hora"]);
                    echo "<div class='col s12 m6 l3'>            
                        <div class='card'>
                            <div class='card-image waves-effect waves-block waves-light'>
                            <img class='activator' src='" . $this->get_estampa() . "'></div>
                            <div class='card-content valign-wrapper orange darken-3 activator'>
                                <img src='../img/logoinicio.png' alt='logo' class='col s5 activator'>
                                <span class='col s7 center-align activator card-title grey-text text-darken-4'>" . $date->format('d-m-Y') . "  " . $hour->format('H:i') . "</span>
                            </div>
                            <div class='card-reveal orange darken-4 white-text'>                
                                <span class='card-title white-text text-darken-4'>" . $date->format('d-m-Y') . " &nbsp;&nbsp; " . $hour->format('H:i') . "<i class='material-icons right'>close</i></span>
                                <p>Lugar: " . $filas["nombre_pab"] . "</p>
                                <p>Localidad: " . $filas["localidad"] . "</p>
                                <p>Precio por persona: " . $filas["precio"] . "</p>
                                <div>Lista de jugadores:</div><p class='col s6'>";
                                $this->listado_jugadores($filas["id_pachanga"]);
                                echo "<br></p>
                            </div>
                        </div>
                    </div>";                                                          
                }
            } else {

            }
            
        }        

        public function listado_jugadores($pach) {
            $cont = 1;            
            $consulta=$this->db->query("SELECT DISTINCT nombre FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido 
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            WHERE par.id_pachanga_partido = " . $pach);
            $total = $consulta->rowCount();
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                if (round($total/2) != $cont) {
                    echo $cont . " " . $filas["nombre"] . "<br>";
                } else {
                    echo $cont . " " . $filas["nombre"] . "<br>";
                    echo "</p><p class='col s6'>";
                }
                $cont++;
            }
        }

        public function get_estampa() {
            $num = rand(1, 40);
            return "../img/estampas/estampa" . $num . ".jpg";
        }

        public function get_recuento() {
            $consulta = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"] . " AND (p.fecha < '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora < '" . $this->hora . "'))");

            return $consulta->rowCount();
        }

    }
?>