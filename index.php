<?php 
    include("vista/header.php");
    include("controlador/cookieskiller.php");
?>
<div class="navbar-fixed">
    <nav class="green accent-2">
        <div class="nav-wrapper ">
            <div class="container row">
                <div class="col s2">
                <a href="#" class=" left brand-logo"><img src="img/logoinicio.png" alt="logotipomarca" class="responsive-img"></a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                </div>                
                <div class="col s6 center"><a href="#"><img src="img/nombre.png" alt="pachangas pro"></a></div>
                <ul class="right hide-on-med-and-down col s4">
                    <li><a href="vista/registro.php" class="btn-flat waves-effect waves-light">Registro</a></li>
                    <li><a href="vista/login.php" class="waves-effect waves-light btn orange darken-4">Acceso</a></li>
                </ul>             
            </div>
                  
        </div>
    </nav>
</div>

<ul class="sidenav green accent-2" id="menu-responsive">
    <li><div class="user-view">
        <div class="background">
            <img src="img/sidelogo.png" alt="logotipo" class="responsive-img">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div></li>
    <div class="container center">
        <li><a href="vista/registro.php" class="btn-flat waves-effect waves-light hoverable">Registro</a></li>
        <li><a href="vista/login.php" class="waves-effect waves-light btn orange darken-4 hoverable">Acceso</a></li>
    </div>    
</ul>
<div class="section"></div>
<div class="slider">
    <ul class="slides">
      <li>
        <img src="img/aficionados.jpg" alt="aficionados"> 
        <div class="caption center-align">
          <h3>Organiza pachangas fácilmente</h3>
          <h5 class="light grey-text text-lighten-3">Gracias a nuestra plataforma podrás organizar pachangas de una manera rápida y sencilla.</h5>
        </div>
      </li>
      <li>
        <img src="img/iniesta.jpg" alt="iniesta"> 
        <div class="caption left-align">
          <h3>Participa en pachangas cerca de ti</h3>
          <h5 class="light grey-text text-lighten-3">Podrás explorar las pachangas que se disputen en tu entorno y participar en ellas de la manera más cómoda.</h5>
        </div>
      </li>
      <li>
        <img src="img/nenes.jpg" alt="nenes jugando"> 
        <div class="caption right-align">
          <h3>Mantente en forma</h3>
          <h5 class="light grey-text text-lighten-3">Mantén la forma física gracias a nuestros consejos de nutrición y ejercicio.</h5>
        </div>
      </li>
    </ul>
</div>

<div class="parallax-container">
    <div class="parallax"><img src="img/balon.jpg"></div>
</div>

<div class="section">
    <div class="row container">
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/amigos.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Juega con amigos</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Juega con amigos<i class="material-icons right">close</i></span>
                    <p>Comparte un rato agradable con tus amigos y retoma esa afición que os apasionaba. Y por supuesto, tenéis que 
                        terminar en el "tercer tiempo".
                    </p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/gente.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Conoce gente nueva</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Conoce gente nueva<i class="material-icons right">close</i></span>
                    <p>Gracias a las pachangas que se organizan cerca de ti podrás conocer a nuevos jugadores con los que echar pachangas.</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/hulk.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Mantén la línea</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Mantén la línea<i class="material-icons right">close</i></span>
                    <p>Pon a raya esos kilos de más y cuida tu salud mientras te diviertes haciendo lo que más te gusta.</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/organiza.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Organiza pachangas</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Organiza pachangas<i class="material-icons right">close</i></span>
                    <p>Nunca fue tan fácil organizar una pachanga. Organiza el encuentro en pocos clics, de manera fácil, rápida y divertida.</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/rutina.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Sal de la rutina</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Sal de la rutina<i class="material-icons right">close</i></span>
                    <p>Libérate del estrés diario jugando pachangas esporádicas para romper la monotonía y el caos.</p>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l4">            
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/pachanga.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Elige tu pachanga</span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Elige tu pachanga<i class="material-icons right">close</i></span>
                    <p>Podrás apuntarte a cualquier pachanga propuesta en la plataforma.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="parallax-container">
    <div class="parallax"><img src="img/estadio.jpg"></div>
</div>

<div class="section"></div>

<div class="fondo">
    <div class="translucido">
        <div class="row container">
            <div class="section center">
                <img src="img/logo.png" alt="logotipo">
            </div> 
        </div>
        <div class="row fondogris">
            <p class="white-text container">Pachangas PRO es un nuevo y sencillo sistema de organización y participación en pachangas de fútbol sala. Se trata de 
                una plataforma online en la que podrás organizar una pachanga de fútbol sala simplemente seleccionando día, hoy y lugar. A partir de ahí cualquiera
                podrá apuntarse a tu pachanga. 
                Además podrás apuntarte a las pachangas que otros usuarios puedan organizar, con lo que, si tienes flexibilidad de horarios, puedes obtener una oferta 
                bastante amplia de pachangas.
                Además podrás contar con unos, siempre útiles, consejos de nutrición y ejercicios para mantenerte en forma.
            </p>
        </div>
    </div>
    
</div>   


<?php include("vista/footer.php"); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        //M.AutoInit();
        var elems = document.querySelectorAll('.slider');
        var instances = M.Slider.init(elems);
        var elems = document.querySelectorAll('.sidenav');
        var instances1 = M.Sidenav.init(elems);
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems);
  });
</script>
