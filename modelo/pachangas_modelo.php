<?php   
    require_once("../modelo/conectar.php");

    class Pachangas_modelo {
        private $db;

        public function __construct() {
            $this->db=Conectar::conexion();
        }

        public function get_pachangas() {
            $consulta=$this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario= par.id_usuario 
            INNER JOIN pachangas p ON par.id_pachanga = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE j.id_usuario = " . $_SESSION["id"]);
            if($consulta->rowCount() > 0) {
                while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='col s12 m6 l3'>            
                    <div class='card-panel orange darken-4 tarjeta'>
                    <div class='card-content white-text'>
                    <h5>" . $filas["fecha"] . "</h5>
                    <p>Lugar: " . $filas["nombre_pab"] . "</p>
                    <p>Hora: " . $filas["hora"] . "</p>
                    <p>Precio por persona: " . $filas["precio"] . "€</p>";
                    /*<div>Organizador: Fran 654927642</div>
                    <br>"*/
                    if($filas["id_creador"] == $_SESSION["id"]) {
                        echo "<p class='col s6'>1 Guille <br>2 Mariana <br>3 Fran <br>4 Messi <br>5 Gordillo</p>
                        <p class='col s6'>6 Pepito <br>7 Julito <br>8 Jaimito <br>9 Pepe <br>10 Pepa</p>
                        <a href='#' class='btn green black-text waves-effect waves-block waves-light'>Cerrar convocatoria</a><br>
                        <a href='#' class='btn yellow black-text waves-effect waves-block waves-light'>Cancelar pachanga</a>";

                    } else {
                        echo "<a href='#' class='btn yellow black-text waves-effect waves-block waves-light'>Abandonar pachanga</a>";
                    }
                    echo "</div></div></div>";
                    
                }
            }
            
        }

    }
?>