<?php   
    require_once("../modelo/conectar.php");

    class Pachangas_modelo {
        private $db;
        private $id_creador;
        private $nombre_creador;
        private $movil_creador;
        private $fecha;
        private $hora;

        public function __construct() {
            $this->db=Conectar::conexion();
            $this->id_creador="";
            $this->nombre_creador="";
            $this->movil_creador="";
            $this->fecha = date("Y-m-d");
            $this->hora = date("H:i:s");
        }

        public function get_pachangas() {
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
            WHERE j.id_usuario = " . $_SESSION["id"] . " AND (p.fecha > '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora > '" . $this->hora . "')) 
            ORDER BY fecha, hora ASC LIMIT " . $inicio . "," . $reg_por_pag);
            if($mostrar->rowCount() > 0) {
                while($filas=$mostrar->fetch(PDO::FETCH_ASSOC)) {
                    $date = new DateTime($filas["fecha"]);
                    $hour = new DateTime($filas["hora"]);
                    $this->get_organizador($filas["id_creador"]);
                    echo "<div class='col s12 m6 l3'>            
                    <div class='card-panel orange darken-4 tarjeta'>
                    <div class='card-content white-text'>
                    <h5><span class='col s8'>" . $date->format('d-m-Y') . "</span><span class='col s4'> " .  $hour->format('H:i') . "</span></h5><br>
                    <p>Lugar: " . $filas["nombre_pab"] . "</p>
                    <p>Dirección: " . $filas["direccion"] . ". " . $filas["localidad"] . "</p>
                    <p>Precio por persona: " . $filas["precio"] . "€</p>";
                    
                    if($filas["id_creador"] == $_SESSION["id"]) {  
                        if($filas["codigo_pachanga"] != "000000") {
                            echo "<p>Código de la pachanga: " . $filas["codigo_pachanga"] . "</p>"; 
                        }
                        echo "<div>Lista de jugadores: </div><p class='col s6'>";
                        $this->listado_jugadores($filas["id_pachanga"]);
                        echo "<br></p>";
                        if($filas["activa"] == 0) {
                            echo "<p class='center-align cerrada white-text'>¡Pachanga cerrada!</p>
                            <p><a href='#' class='reabrir btn green accent-2 black-text waves-effect waves-block waves-light' data-id_pachanga='" . $filas["id_pachanga"] .
                        "'>Reabrir convocatoria</a></p>";
                        } else {
                            echo "<p><a href='#' class='cerrar btn green accent-2 black-text waves-effect waves-block waves-light' data-id_pachanga='" . $filas["id_pachanga"] .
                        "'>Cerrar convocatoria</a></p>";
                        }
                        echo "<form action='modificar_pachanga.php' method='post'>
                            <p><button class='col s12 modificar btn yellow black-text waves-effect waves-block waves-light' type='submit' name='idp' value=" . $filas["id_pachanga"] . ">Modificar pachanga</button></p>
                        </form><br><br>
                        <p><a class='cancel btn red accent-3 white-text waves-effect waves-block waves-light modal-trigger' data-id_pachanga='" . $filas["id_pachanga"] .
                        "' href='#modal1'>Cancelar pachanga</a></p>";

                    } else {
                        echo "<p>Organizador: " . $this->nombre_creador . " " . $this->movil_creador . "</p>
                        <a href='#modal2' class='baja btn yellow black-text waves-effect waves-block waves-light modal-trigger' value='" . $filas["id_pachanga"] . "' data-id_pachanga='" . $filas["id_pachanga"] .
                        "'>Abandonar pachanga</a>";
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

        public function abandonar($idp,$usuario) {
            $this->db->query("DELETE FROM partidos WHERE id_usuario_partido = " . $usuario . " AND id_pachanga_partido = " . $idp);
            $this->convocatoria($idp);
        }

        public function cerrar($idp) {
            $this->db->query("UPDATE pachangas SET activa = 0 WHERE id_pachanga = " . $idp);
        }

        public function reabrir($idp) {
            $this->db->query("UPDATE pachangas SET activa = 1 WHERE id_pachanga = " . $idp);
        }

        public function cancelar($idp) {
            $this->db->query("DELETE FROM pachangas WHERE id_pachanga = " . $idp);
            $this->db->query("DELETE FROM partidos WHERE id_pachanga_partido = " . $idp);
        }

        public function get_recuento() {
            $consulta = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"] . " AND (p.fecha > '" . $this->fecha . "' OR (p.fecha = '" . $this->fecha . "' AND p.hora > '" . $this->hora . "'))");

            return $consulta->rowCount();
        }

        public function convocatoria($idp) {
            $consulta = $this->db->query("SELECT DISTINCT id_usuario_partido FROM partidos WHERE id_pachanga_partido = '" . $idp . "'");
            $apuntados = $consulta->rowCount();

            $consulta = $this->db->query("SELECT participantes FROM pachangas WHERE id_pachanga = '" . $idp . "'");
            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $aforo = $filas["participantes"];
            }

            if($apuntados == $aforo) {
                $consulta = $this->db->query("UPDATE pachangas SET activa = 0 WHERE id_pachanga = '" . $idp . "'");
            } else {
                $consulta = $this->db->query("UPDATE pachangas SET activa = 1 WHERE id_pachanga = '" . $idp . "'");
            }
        }

    }
?>