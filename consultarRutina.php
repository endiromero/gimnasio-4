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
/* */
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
/* hacemos la insersión en la BD de los datos del Usuario */
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    $insertSQL = sprintf("INSERT INTO usuario (id_Usuario, Nombre, Apellido, Edad, Sexo, Direccion, Telefono, Plan, RutAsignada1) VALUES ( %s ,%s, %s ,%s ,%s ,%s ,%s ,%s, %s)", 
            GetSQLValueString($_POST['id_Usuario'], "int"), 
            GetSQLValueString($_POST['Nombre'], "text"), 
            GetSQLValueString($_POST['Apellido'], "text"), 
            GetSQLValueString($_POST['Edad'], "int"), 
            GetSQLValueString($_POST['Sexo'], "text"), 
            GetSQLValueString($_POST['Direccion'], "text"), 
            GetSQLValueString($_POST['Telefono'], "int"), 
            GetSQLValueString($_POST['Plan'], "text"),
            GetSQLValueString($_POST['RutAsignada1'], "text"));


/* Seleccionamos la Base de Datos */
    mysql_select_db($database_conexion, $conexion);
    $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
/* Cuando se haga la insersión se redirige a la pagina de inicio de sesion */
    $insertGoTo = "acceso.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
    header(sprintf("Location: %s", $insertGoTo));
}
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
            <script>
               /* Funcion Subir Imagen, este abre una ventana para adjuntar la imagen de la rutina*/
                function subirimagen() {
                    self.name = 'opener';
                    remote = open('gestionimagen.php', 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
                    remote.focus();
                }
            </script>


            <section id="content"><div class="ic"></div>

                <div class="container_12">
                    <div class="grid_12">
                        <div class="col-md-12">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4" id="login">
                                <!-- FORMULARIO DE INSERSION DE USUARIOS-->
                                <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                                    <table align="center">


                                        <tr valign="baseline">
                                            <td nowrap align="right">Nombre:</td>
                                            <td><span id="sprytextfield3">
                                                    <input name="Nombre" type="text" id="Nombre" value="" size="32">
                                                    </td>
                                                    </tr>
                                                    <tr valign="baseline">
                                                        <td nowrap align="right">Apellido:</td>
                                                        <td><span id="sprytextfield4">
                                                                <input name="Apellido" type="text" id="Apellido" value="" size="32">
                                                                </td>
                                                                </tr>
                                                                <tr valign="baseline">
                                                                    <td nowrap align="right">Edad:</td>
                                                                    <td><input type="text" name="Edad" value="" size="32" id="Edad"></td>
                                                                </tr>
                                                                <tr valign="baseline">
                                                                    <td nowrap align="right">Sexo:</td>
                                                                    <td><span id="sprytextfield5">
                                                                            <input name="Sexo" type="text" id="Sexo" value="" size="32">
                                                                            <span class="textfieldRequiredMsg">Se necesita un valor.</span></span>*</td>
                                                                </tr>
                                                                <tr valign="baseline">
                                                                    <td nowrap align="right">Imagen:</td>
                                                                    <td><label for="RutAsignada1"></label>
                                                                        <input type="text" name="RutAsignada1" id="RutAsignada1">
                                                                        <input type="button" name="button" id="button" value="Subir Imagen" onclick= "javascript:subirimagen();"></td>
                                                                </tr>
                                                                
                                                                <tr valign="baseline">
                                                                    <td nowrap align="right">Identificación:</td>
                                                                    <td><span id="sprytextfield7">
                                                                            <input name="id_Usuario" type="text" id="id_Usuario" value="" size="32">
                                                                            </td>
                                                                            </tr>
                                                                            <tr valign="baseline">
                                                                                <td nowrap align="right">Plan:</td>
                                                                                <td><span id="sprytextfield8">
                                                                                        <input name="Plan" type="text" id="Plan" value="" size="32">
                                                                                        </td>
                                                                                        </tr>
                                                                                        <tr valign="baseline">
                                                                                            <td nowrap align="right">&nbsp;</td>
                                                                                            <td><input type="submit" value="Insertar Producto"></td>
                                                                                        </tr>
                                                                                        </table>
                                                                                        <input type="hidden" name="MM_insert" value="form1">
                                                                                        </form>

                                                                                        </div>
                                                                                        <div class="col-md-4"></div>
                                                                                        <div class="row">



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
                                                                                            //Permite sustituir la fuente predeterminada de tu web por otra cualquiera
                                                                                            Cufon.now();
                                                                                        </script>
                                                                                        </body>
                                                                                        </html>