<?php require_once('conexionBD/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {

    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
        if (PHP_VERSION < 6) {
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }

        $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }

}

if (!isset($_SESSION)) {
    session_start();
}
/* Hacemos la consulta de la bd y  mandamos la información a través de la url con el metodo GET*/
$varRutina_DatosUsuario = "0";
if (isset($_GET["recordID"])) {
    $varRutina_DatosUsuario = $_GET["recordID"];
}
mysql_select_db($database_conexion, $conexion);
$query_DatosUsuario = sprintf("SELECT id_Ficha FROM ficha WHERE ficha.Usuario_id_Usuario = %s", 
        GetSQLValueString($varRutina_DatosUsuario, "int"));

$DatosUsuario = mysql_query($query_DatosUsuario, $conexion) or die(mysql_error());
$row_DatosUsuario = mysql_fetch_assoc($DatosUsuario);
$totalRows_DatosUsuario = mysql_num_rows($DatosUsuario);
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
        <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
        <!--[if lt IE 9]>
                    <script type="text/javascript" src="js/html5.js"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
            <![endif]-->
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
                            <div class="col-md-4">
                                
                            </div>
                            
                            <div class="col-md-4" id="login">
                                <form class="form-signin" role="form">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit"><a href="infoPersonal.php?recordID=<?php echo $row_DatosUsuario['id_Usuario']; ?>">Consultar Información Personal</a></button>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit"><a href="valoracionAntropometrica.php?recordID=<?php echo $row_DatosUsuario['id_Usuario']; ?>">Valoración Antropométrica</a></button>
                                    <a href="consultarInfo.php">Volver</a>
                                </form>
                            </div>
                            <div class="col-md-4"></div>
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
<?php
mysql_free_result($DatosUsuario);
?>