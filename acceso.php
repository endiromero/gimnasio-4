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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
    session_start();
}
// *** Comprobamos que inicie sesión con el id_Usuario Correcto, Se hace la conexion en la BD
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
// *** Si es correcta la información ingresa al siguiente modulo, sino se envia mensaje de error
if (isset($_POST['id_Usuario'])) {
    $loginUsername = $_POST['id_Usuario'];
    $MM_fldUserAuthorization = "";
    $MM_redirectLoginSuccess = "consultarInfo.php";
    $MM_redirectLoginFailed = "acceso_error.php";
    $MM_redirecttoReferrer = false;
    mysql_select_db($database_conexion, $conexion);
// *** Se hace la sentencia a la BD 
    $LoginRS__query = sprintf("SELECT id_Usuario FROM usuario WHERE id_Usuario=%s", GetSQLValueString($loginUsername, "text"));

    $LoginRS = mysql_query($LoginRS__query, $conexion) or die(mysql_error());
    $row_LoginRS = mysql_fetch_assoc($LoginRS);
    $loginFoundUser = mysql_num_rows($LoginRS);
    if ($loginFoundUser) {
        $loginStrGroup = "";

        if (PHP_VERSION >= 5.1) {
            session_regenerate_id(true);
        } else {
            session_regenerate_id();
        }
        //Declaramos 2 variables de sesion y se los asignamos a este
        $_SESSION['MM_Username'] = $loginUsername;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;
        $_SESSION['MM_IdUsuario'] = $row_LoginRS["id_Usuario"];

        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
        }
        header("Location: " . $MM_redirectLoginSuccess);
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }
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
                                <!---------Formulario Inicio de Sesion------------->
                                <form class="form-signin" role="form" method="POST" action="<?php echo $loginFormAction; ?>">
                                    <div class="text-center">
                                        <img id="avatar" src="images/gimnasio.PNG" alt="avatar">
                                    </div>
                                    <input id="id_Usuario"  class="form-control" placeholder="Identificación" name="id_Usuario">
                                    <input type="submit" name="button" id="button" value="Iniciar Sesion">
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
            //Permite sustituir la fuente predeterminada de tu web por otra cualquiera
            Cufon.now();
        </script>
    </body>
</html>