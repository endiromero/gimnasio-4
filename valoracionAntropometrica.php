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
$varRutinas_DatosUsuarios = "0";
if (isset($_GET["recordID"])) {
    $varRutinas_DatosUsuarios = $_GET["recordID"];
}
mysql_select_db($database_conexion, $conexion);
$query_DatosUsuarios = sprintf("SELECT * FROM ficha WHERE ficha.Usuario_id_Usuario = %s", GetSQLValueString($_SESSION['MM_IdUsuario'], "int"), GetSQLValueString($_GET['recordID'], "text"));
$DatosUsuarios = mysql_query($query_DatosUsuarios, $conexion) or die(mysql_error());
$row_DatosUsuarios = mysql_fetch_assoc($DatosUsuarios);
$totalRows_DatosUsuarios = mysql_num_rows($DatosUsuarios);
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
                        
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            La Siguiente tabla muestra su Valoración Antropométria:
                            <br>
                            <div class="ConsultarInfor2">
                                <img src="images/atleta.gif" align=center  width="170" height="170"></div>
                            <br>
                            <div class="panel panel-primary" >
                            
                                <table class="table table-hover"> <!-- Lo cambiaremos por CSS -->
                                    <tr class="active">
                                        <td>Peso</td>
                                        <td>Masa Corporal</td>
                                        <td>Brazo </td>
                                        <td>Antebrazo</td>
                                        <td>Torax</td>
                                        <td>Cintura</td>
                                        <td>Abdomen</td>
                                        <td>Cadera</td>
                                        <td>Muslo</td>
                                        <td>Pierna</td>
                                        <td>Cuello</td>
                                        <td>Muslo Medio</td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row_DatosUsuarios['Peso']; ?> kg</td>
                                        <td><?php echo $row_DatosUsuarios['Masa Corporal']; ?> kg/m2</td>
                                        <td><?php echo $row_DatosUsuarios['Brazo']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Antebrazo']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Torax']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Cintura']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Abdomen']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Cadera']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Muslo']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Pierna']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Cuello']; ?> cm</td>
                                        <td><?php echo $row_DatosUsuarios['Muslo Medio']; ?> cm</td>
                                    </tr>
                                </table>

                               

                            </div>
                           <a href="consultarInfo.php">Volver</a>
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
mysql_free_result($DatosUsuarios);
?>