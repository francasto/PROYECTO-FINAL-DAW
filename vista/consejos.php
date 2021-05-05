<?php include("header_privado.php"); ?>

    <div class="section container">
        <div class="row center-align">
            <h2>Consejos útiles</h2>
            <h6>Te mostramos unos consejos útiles sobre alimentación y deporte.</h6><br><br>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="tabs orange darken-3">
                    <li class="tab col s4"><a href="#calentamiento" class="black-text">Calentamiento</a></li>
                    <li class="tab col s4"><a href="#estiramientos" class="black-text">Estiramientos</a></li>
                    <li class="tab col s4"><a href="#nutricion" class="black-text">Nutrición</a></li>
                </ul>
                <div id="calentamiento" class="col s12 green accent-2">
                    <p>Los ejercicios deben implicar a los grandes grupos musculares. 
                    La duración de esta fase puede oscilar entre 8 y 12 minutos.</p>
                    <p>Carrera continua. Durante 3 a 6 minutos se realizará un carrera contínua a un ritmo no muy elevado previa a la fase de activación en la que se realizarán los siguente ejercicios:</p>
                    <ul class="browser-default">
                        <li>Cintura. En carrera, parar giran la cintura y seguir (4 repeticiones aproximadamente).</li>
                        <li>Carrera lateral. A mitad de camino se cambia de lado.</li>
                        <li>Carrera de espaldas.</li>
                        <li>Tocar con dos manos el suelo. Mientras se va corriendo, agacharse, tocar el suelo con las dos manos y saltar.</li>
                        <li>Skipping.</li>
                        <li>Aductores.</li>
                        <li>Giros de tronco en carrera.</li>
                        <li>Calentamiento de brazos y hombros (Delante-Detrás).</li>
                        <li>Saltos de cabeza. Se saltará mientras se va corriendo (3 o cuatro veces), como si se rematara de cabeza. Los porteros imitarán el salto para coger un balón.</li>
                        <li>Amplitud de zancada.</li>
                        <li>Fintas y cambio de ritmo.</li>
                        <li>Sprints.</li>
                        <li>Andar pausadamente.</li>
                    </ul>
                </div>
                <div id="estiramientos" class="col s12 green accent-2">
                    <p>Se deberán incluir los principales grupos musculares y realizarse sin rebotes, aguantando la posición, “no dolorosa” durante 20 segundos aproximadamente. 
                    La duración de esta fase puede oscilar entre 5 y 10 minutos.</p>
                    <ul class="browser-default">
                        <li>Cuello: realizamos inclinación de la cabeza hacia lado izquierdo y derecho. Realizamos giros completos de cabeza. 8 repeticiones.</li>
                        <li>Brazos: nos agarramos las manos y extendemos los brazos lo máximo por encima de la cabeza. Lo mismo pero con los brazos por detrás de la espalda. Aguantamos en cada posición 8 segundos.</li>
                        <li>Glúteos: flexionamos una pierna y la elevamos hacia arriba a tocar con la rodilla el pecho. Realizamos el ejercicio con derecha e izquierda. Aguantamos en esta posición 8 segundos con cada pierna.</li>
                        <li>Cuadriceps: desde de pie flexionamos una rodilla y llevamos la pierna hacia atrás a tocar el talón el glúteo. Nos apoyamos con una mano en un compañero para no perder el equilibrio, mientras que con la otra juntamos el talón al glúteo. Realizamos el ejercicio con derecha e izquierda. Aguantamos en esta posición 8 segundos con cada pierna.</li>
                        <li>Aductores: desde de pie abrimos piernas y flexionamos una rodilla para acercarnos al suelo. Realizamos el ejercicio con derecha e izquierda. Aguantamos en esta posición 8 segundos con cada pierna.</li>
                        <li>Gemelos: desde de pie nos agachamos a tirar del empeine del pie hacia nosotros. Estiramos de esta forma el gemelo derecho y luego el izquierdo. Aguantamos en esta posición 8 segundos con cada pierna.</li>
                        <li>Tobillos: realizamos movimientos circulares con ambos pies derecho e izquierdo y en ambos sentidos hacia dentro y hacia afuera. Duración: 8 repeticiones con ambos tobillos.</li>
                    </ul>
                </div>
                <div id="nutricion" class="col s12 green accent-2">
                    <p>La nutrición deportiva debe ser variada, evitando eliminar grupos de alimentos esenciales y teniendo siempre en cuenta las exigencias que conlleva la práctica de la modalidad deportiva.</p>
                    <ul class="browser-default">
                        <li>Basa tu plan nutricional en alimentos saludables.</li>
                        <li>Hidrátate. Un músculo deshidratado es más factible de sufrir lesiones.</li>
                        <li>Centra tu dieta en alimentos naturales.</li>
                        <li>Da prioridad al consumo de verduras y frutas.</li>
                        <li>Planifica tus comidas.</li>
                        <li>ATENCIÓN al “Nutrient Timing”. Saber elegir qué comer antes, durante y después del ejercicio.</li>
                        <li>Adiós al miedo a las grasas. Los ácidos grasos esenciales omega-3 ejercen funciones estructurales muy importantes y regulan los procesos inflamatorios.</li>
                        <li>Huye de la fobia a los carbohidratos. Debes ajustar la ingesta de carbohidratos personalizándola a tu nivel de actividad física.</li>
                        <li>Óptimo consumo de proteínas. Las proteínas son imprescindibles para poder recuperar, regenerar y reparar los tejidos musculares.</li>
                        <li>Previo a incluir suplementos ¡INFÓRMATE!</li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>

<?php include("footer_privado.php"); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tabs');
        var instances = M.Tabs.init(elems, {
            swipeable: true,
            responsiveThreshold: Infinity
        });

    });
</script>