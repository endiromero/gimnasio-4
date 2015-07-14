<?php require_once('conexionBD/conexion.php'); ?>
<!-- Session del Id del usuario y del nombre del usuario-->
<?php
$_SESSION['MM_Username'] = "";
$_SESSION['MM_UserGroup'] = "";
$_SESSION['MM_IdUsuario'] = "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gimnasio Fitness</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/grid_12.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">
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
        <div class="main">
            <div class="bg-img"></div>
            <!--==============================header=================================-->
            <?php include("includes/menu.php"); ?>
            <!--==============================content================================-->

            <section id="content"><div class="ic"></div>

                <div class="container_12">

                    <div class="grid_12">
                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" id="login">
                                <!--Formulario de Cierre de sesion -->
                                <form class="form-signin" role="form" method="POST" action="<?php echo $loginFormAction; ?>">
                                    <div class="text-center">
                                        <img id="avatar" src="images/gimnasio.PNG" alt="avatar">    
                                    </div>
                                    <div class="text-center">
                                        Se cerró la sesión correctamente
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            <!--==============================footer=================================-->
            <footer>
                <p>© 2015 Gimnasio Fitness</p>
            </footer>	
        </div>    
        <script>
            Cufon.now();
        </script>
    </body>
</html>