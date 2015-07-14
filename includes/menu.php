<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
      
        <script src="js/jquery-1.7.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/tms-0.3.js"></script>
        <script src="js/tms_presets.js"></script>
        <script src="js/cufon-yui.js"></script>
        <script src="js/Asap_400.font.js"></script>
        <script src="js/Coolvetica_400.font.js"></script>
        <script src="js/Kozuka_M_500.font.js"></script>
        <script src="js/cufon-replace.js"></script>
        <script src="js/FF-cash.js"></script>
        <script>
            $(window).load(function () {
                $('.slider')._TMS({
                    prevBu: '.prev',
                    nextBu: '.next',
                    pauseOnHover: true,
                    pagNums: false,
                    duration: 800,
                    easing: 'easeOutQuad',
                    preset: 'Fade',
                    slideshow: 7000,
                    pagination: '.pagination',
                    waitBannerAnimation: false,
                    banners: 'fade'
                })
            })
        </script>

    </head>
    <body>
       
            <!--==============================header=================================-->
            <header>
                <h1><a href="index.php">Gimnasio <strong>Fitness.</strong></a></h1>
                <nav>
                    <div class="social-icons">
                        <a href="#" class="icon-2"></a>
                        <a href="#" class="icon-1"></a>
                    </div>
                    <ul class="menu">
                        <li class="current"><a href="index.php">Capacitaciones</a></li>
                        <li><a href="calendario.php">Calendario</a></li>
                        <li><a href="planes.php">Planes</a></li>
                        <li><a href="galeria.php">Galeria</a></li>
                        <li> <?php include("includes/iniciosesion.php"); ?>
                        <!--<a href="acceso.php">Iniciar Sesion</a>--></li>
                    </ul>
                </nav>
            </header>   

        	
     
        <script>
            //Permite sustituir la fuente predeterminada de tu web por otra cualquiera
            Cufon.now();
        </script>
    </body>
</html>