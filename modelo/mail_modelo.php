<?php
    class Mail_modelo {
        private $destino;
        private $asunto;
        private $texto;
        private $cabecera="MIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n";

        public function __construct($d, $a, $t) {
            $this->destino=$d;
            $this->asunto=$a;
            $this->texto=$t;
            $this->cabecera;

        }

        public function enviar_mail() {   
            mail($this->destino,$this->asunto,$this->texto,$this->cabecera);             
        }
    }
?>