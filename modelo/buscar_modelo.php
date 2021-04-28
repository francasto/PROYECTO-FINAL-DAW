<?php   
    require_once("../modelo/conectar.php");

    class Buscar_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_pachangas() {
            if(isset($_POST["buscar"])) {       
                $buscar=htmlentities(addslashes($_POST["buscar"]));

                $consulta=$this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  pachangas p ON j.id_usuario = p.id_creador 
                INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
                WHERE pab.localidad = '" . $buscar . "' or p.codigo_pachanga = '" . $buscar . "'");
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
                        <a href='#' class='baja btn green white-text waves-effect waves-block waves-light' data-id_pachanga='" . $filas["id_pachanga"] .
                            "'>Apuntarse a la pachanga</a></div></div></div>";
                        }
                   
                } else {
                    echo "<h4>Actualmente no existen pachangas disponibles con los datos introducidos.</h4>";
                }
            }
        }
    }
?>