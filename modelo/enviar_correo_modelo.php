<?php
    require_once("../modelo/conectar.php");

    class Enviar_correo_modelo {
        private $db;
        private $destino;
        private $asunto;
        private $contenido;
        private $cabecera;   

        public function __construct($correo) {
            $this->db=Conectar::conexion();
            $this->destino=$correo;
            $this->asunto="";
            $this->contenido="<div style='background-color:#e65100; padding:20px; width:1024px; height:400px; text-align:center'>";
            $this->contenido.="<img src='ruta_del_logo' alt='Aquí irá el logo cuando lo suba al servidor.'>";
            $this->cabecera = "MIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n"; 
        }
    
        public function enviar_mail() {   
            mail($this->destino,$this->asunto,$this->contenido,$this->cabecera);             
        }

        public function bienvenida() {            
            $texto ="<h1>Bienvenido a Pachangas PRO</h1>";
            $texto.="<h3>Todo un mundo de pachangas al alcance de la mano.</h3>";
            $texto.="<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.="</div>";
            $this->contenido .= $texto;
            $this->asunto = "Bienvenido a Pachangas PRO";

            $this->enviar_mail();
        }

        public function apuntado($idp) {            
            $texto = "<h1>Pachangas PRO</h1>";
            $texto.= "<h3>Apuntado a una pachanga.</h3>";
            $texto.= "<p>El jugador: " . $this->get_jugador($this->destino) . " se ha apuntado a la pachanga.</p>";
            $texto.= $this->datos_pachanga($idp);
            $texto.= "<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.= "</div>";
            $this->contenido .= $texto;
            $this->asunto = "Apuntado a una pachanga";

            $this->enviar_mail();
            $this->destino = $this->get_organizador($idp);
            $this->enviar_mail();
        }

        public function borrado($idp) {            
            $texto = "<h1>Pachangas PRO</h1>";
            $texto.= "<h3>Borrado de una pachanga.</h3>";
            $texto.= "<p>El jugador: " . $this->get_jugador($this->destino) . " se ha borrado de la pachanga.</p>";
            $texto.= $this->datos_pachanga($idp);
            $texto.= "<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.= "</div>";
            $this->contenido .= $texto;
            $this->asunto = "Borrado de una pachangas";

            $this->enviar_mail();
        }

        public function modificada($idp) {            
            $texto ="<h1>Pachangas PRO</h1>";
            $texto.="<h3>Una pachanga en la que estabas apuntado ha sido modificada.</h3>";
            $texto.= $this->datos_pachanga($idp);
            $texto.="<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.="</div>";
            $this->contenido .= $texto;
            $this->asunto = "Pachanga modificada";

            $this->enviar_todos($idp);
        }

        public function cancelada($idp) {            
            $texto ="<h1>Pachangas PRO</h1>";
            $texto.="<h3>Una pachanga en la que estabas apuntado ha sido cancelada.</h3>";
            $texto.= $this->datos_pachanga($idp);
            $texto.="<a href='http://localhost/vista/login.php'>Accede a tu zona privada</a>";
            $texto.="</div>";
            $this->contenido .= $texto;
            $this->asunto = "Pachanga cancelada";

            $this->enviar_todos($idp);
        }

        public function enviar_todos($idp) {
            $consulta=$this->db->query("SELECT DISTINCT email FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido 
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            WHERE par.id_pachanga_partido = " . $idp);

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->destino = $filas["email"];
                $this->enviar_mail();
            }
        }

        public function password($link) {                       
            $texto = "<h1>Pachangas PRO</h1>";
            $texto.= "<h3>Aquí podrás restablecer tu contraseña.</h3>";
            $texto.= "<p>Se ha recibido la solicitud de restablecimiento de contraseña.";
            $texto.= " Para restablecer tu contraseña haz clic en el link siguiente: <a href='" . $link . "' style='color:black;'>Reestablecer contraseña.</a> </p>";
            $texto.= "<p>O copia y pega la URL en tu navegador: " . $link . "</p>";
            $texto.= "<p>Si no has solicitado el reseteo de tu contraseña, simplemente ignora este mensaje.</p>";
            $texto.= "</div>";
            $this->contenido .= $texto;
            $this->asunto = "Restablecer contraseña de Pachangas PRO";

            $this->enviar_mail();
        }

        public function get_organizador($idp) {
            $organizador = $this->db->query("SELECT email FROM jugadores j INNER JOIN pachangas p ON j.id_usuario = p.id_creador 
            WHERE p.id_pachanga = " . $idp);

            while($filas=$organizador->fetch(PDO::FETCH_ASSOC)) {
                $correo = $filas["email"];                
            }

            return $correo;
        }

        public function get_jugador($correo) {
            $organizador = $this->db->query("SELECT * FROM jugadores WHERE email = '" . $correo . "'");
            
            while($filas=$organizador->fetch(PDO::FETCH_ASSOC)) {
                $jugador = $filas["nombre"] . " " . $filas["apellido1"] . " \"" . $filas["apodo"] . "\"";                
            }

            return $jugador;
        }

        public function get_movil($correo) {
            $movil = $this->db->query("SELECT movil FROM jugadores WHERE email = '" . $correo . "'");

            
            while($filas=$movil->fetch(PDO::FETCH_ASSOC)) {
                $tel = $filas["movil"];                
            }

            return $tel;
        }

        public function datos_pachanga($idp) {
            $datos = $this->db->query("SELECT DISTINCT * FROM jugadores j INNER JOIN  partidos par ON j.id_usuario = par.id_usuario_partido
            INNER JOIN pachangas p ON par.id_pachanga_partido = p.id_pachanga 
            INNER JOIN pabellones pab ON p.id_pabellon = pab.id_pabellon 
            WHERE p.id_pachanga = " . $idp);

            while($filas=$datos->fetch(PDO::FETCH_ASSOC)) {
                $date = new DateTime($filas["fecha"]);
                $hour = new DateTime($filas["hora"]);
                $organizador = $this->get_organizador($idp);

                $texto = "<div>            
                <h2>Fecha: " . $date->format('d-m-Y') . " Hora: " .  $hour->format('H:i') . "</h2>
                <p>Lugar: " . $filas["nombre_pab"] . "</p>
                <p>Dirección: " . $filas["direccion"] . ". " . $filas["localidad"] . "</p>
                <p>Precio por persona: " . $filas["precio"] . "€</p>
                <p>Organizador: " . $this->get_jugador($organizador) . " " . $this->get_movil($organizador) . "</p>
                </div>";                
            }
            
            return $texto;
        }

    }
?>
