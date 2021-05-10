<?php   
    require_once("../modelo/conectar.php");
    require_once("../modelo/pachangas_modelo.php");

    class Buscar_modelo {
        private $db;
        private $fecha;
        private $hora;
        private $buscar;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->fecha = date("Y-m-d");
            $this->hora = date("h:i:s");
            if(isset($_POST["buscar"])) {
                $this->buscar = $_POST["buscar"];
            }
        }

        public function get_pachangas() {
            $reg_por_pag = 4;
            if(isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
            } else {
                $pagina = 1;
            }

            $inicio = ($pagina - 1) * $reg_por_pag;

            if(isset($_POST["buscar"])) {       
                $this->buscar = htmlentities(addslashes($_POST["buscar"]));
                $this->buscar = strtolower($this->buscar);
                $existen = false;

                $consulta = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  pachangas p ON j.id_usuario = p.id_creador 
                INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
                WHERE (pab.localidad = '" . $this->buscar . "' OR p.codigo_pachanga = '" . $this->buscar . "') 
                AND activa = 1 
                AND (p.fecha > '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora > '" . $this->hora . "')) 
                AND ((pab.localidad = '". $this->buscar . "' AND p.codigo_pachanga = '000000') OR (p.codigo_pachanga = '". $this->buscar . "'))  
                AND p.id_pachanga NOT IN (SELECT DISTINCT id_pachanga_partido FROM jugadores j INNER JOIN  partidos p ON j.id_usuario = p.id_usuario_partido 
                    WHERE j.id_usuario = '" . $_SESSION["id"] . "')
                    ORDER BY fecha, hora ASC LIMIT " . $inicio . "," . $reg_por_pag);

                if($consulta->rowCount() > 0) {
                    while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {                         
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

        public function get_recuento() {
            $consulta = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  pachangas p ON j.id_usuario = p.id_creador 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE (pab.localidad = '" . $this->buscar . "' OR p.codigo_pachanga = '" . $this->buscar . "') 
            AND activa = 1 
            AND (p.fecha > '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora > '" . $this->hora . "')) 
            AND p.id_pachanga NOT IN (SELECT DISTINCT id_pachanga_partido FROM jugadores j INNER JOIN  partidos p ON j.id_usuario = p.id_usuario_partido 
                WHERE j.id_usuario = '" . $_SESSION["id"] . "')");

            return $consulta->rowCount();
        }
    }
?>