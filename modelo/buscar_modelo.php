<?php   
    require_once("../modelo/conectar.php");
    require_once("../modelo/pachangas_modelo.php");

    class Buscar_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_pachangas() {
            if(isset($_POST["buscar"])) {       
                $buscar = htmlentities(addslashes($_POST["buscar"]));
                $buscar = strtolower($buscar);
                $existen = false;

                $consulta=$this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  pachangas p ON j.id_usuario = p.id_creador 
                INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
                WHERE (pab.localidad = '" . $buscar . "' or p.codigo_pachanga = '" . $buscar . "') and activa = 1 ORDER BY fecha, hora ASC");
                if($consulta->rowCount() > 0) {
                    while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                        if($this->apuntado($filas["id_pachanga"],$_SESSION["id"])->rowCount() == 0) {
                            if((($buscar == strtolower($filas["localidad"])) && ("000000" == $filas["codigo_pachanga"])) || ($buscar == $filas["codigo_pachanga"])) {
                                $date = new DateTime($filas["fecha"]);
                                $hour = new DateTime($filas["hora"]);
                                echo "<div class='col s12 m6 l3'>            
                                <div class='card-panel orange darken-4 tarjeta'>
                                <div class='card-content white-text'>
                                <h5><span class='col s8'>" . $date->format('d-m-Y') . "</span><span class='col s4'> " .  $hour->format('H:i') . "</span></h5><br>
                                <p>Lugar: " . $filas["nombre_pab"] . "</p>
                                <p>Dirección: " . $filas["direccion"] . ". " . $filas["localidad"] . "</p>
                                <p>Precio por persona: " . $filas["precio"] . "€</p>
                                <p>Organizador: " . $filas["nombre"] . " " . $filas["movil"] . "</p>
                                <a href='#' class='alta btn green white-text waves-effect waves-block waves-light' data-id_pachanga='" . $filas["id_pachanga"] .
                                    "'>Apuntarse a la pachanga</a></div></div></div>";
                                $existen = true;
                            }                            
                        }                       
                    }
                   
                } 
                if(!$existen) {
                    echo "<h4>Actualmente no existen pachangas disponibles con los datos introducidos.</h4>";
                }
            }
        }

        public function apuntado($idj, $idp) {
            $c = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos p ON j.id_usuario = p.id_usuario_partido 
                WHERE p.id_pachanga_partido = '" . $idj . "' AND j.id_usuario = '" . $idp . "'");
            
            return $c;
        }

        public function apuntarse($usuario,$idp) {
            $this->db->query("INSERT INTO partidos (id_usuario_partido, id_pachanga_partido) VALUES (" . $idp . "," . $usuario . ")");
            $convocatoria = new Pachangas_modelo();
            $convocatoria->convocatoria($usuario);
        }
    }
?>