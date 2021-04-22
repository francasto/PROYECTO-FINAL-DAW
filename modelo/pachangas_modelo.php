<?php   
    require_once("../modelo/conectar.php");

    class Pachangas_modelo {
        private $db;
        private $id_creador;
        private $nombre_creador;
        private $movil_creador;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->id_creador="";
            $this->nombre_creador="";
            $this->movil_creador="";
        }

        public function get_pachangas() {
            $consulta=$this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario= par.id_usuario 
            INNER JOIN pachangas p ON par.id_pachanga = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"]);
            if($consulta->rowCount() > 0) {
                while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime($filas["fecha"]);
                    $hour = new DateTime($filas["hora"]);
                    $this->get_organizador($filas["id_creador"]);
                    echo "<div class='col s12 m6 l3'>            
                    <div class='card-panel orange darken-4 tarjeta'>
                    <div class='card-content white-text'>
                    <h5>" . $date->format('d-m-Y') . "</h5>
                    <p>Lugar: " . $filas["nombre_pab"] . "</p>
                    <p>Hora: " . $hour->format('H:i') . "</p>
                    <p>Precio por persona: " . $filas["precio"] . "€</p>
                    <p>Organizador: " . $this->nombre_creador . " " . $this->movil_creador . "</p>";
                    
                    if($filas["id_creador"] == $_SESSION["id"]) {  
                        echo "<div>Lista de jugadores: </div><p class='col s6'>";
                        $this->listado_jugadores($filas["id_pachanga"]);
                        echo "</p><br><br>
                        <a href='#' class='btn green black-text waves-effect waves-block waves-light'>Cerrar convocatoria</a><br>
                        <a href='#' class='btn yellow black-text waves-effect waves-block waves-light'>Modificar pachanga</a><br>
                        <a href='#' class='btn red white-text waves-effect waves-block waves-light'>Cancelar pachanga</a>";

                    } else {
                        echo "<a href='#' class='btn yellow black-text waves-effect waves-block waves-light'>Abandonar pachanga</a>";
                    }
                    echo "</div></div></div>";
                    
                }
            }
            
        }

        public function get_organizador($id) {
            $consulta=$this->db->query("select nombre, movil from jugadores where id_usuario = " . $id);
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->nombre_creador=$filas["nombre"];
                $this->movil_creador=$filas["movil"];
            }
        }

        public function listado_jugadores($pach) {
            $cont = 1;            
            $consulta=$this->db->query("SELECT DISTINCT nombre FROM jugadores j INNER JOIN  partidos par ON j.id_usuario= par.id_usuario 
            INNER JOIN pachangas p ON par.id_pachanga = p.id_pachanga 
            WHERE par.id_pachanga = " . $pach);
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

    }
?>