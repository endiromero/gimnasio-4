<?php require_once('conexionBD/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = "SELECT usuario.id_Usuario FROM usuario";
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<!-- Llamamos la Funcion ObtenerNombreUsuario y realizamos la sesión, si inicia sesión se muestra la opción de
cerrar sesión, sino, solo se muestra iniciar sesion-->
<div class="iniciosesion">  
    <?php
    if ((isset($_SESSION['MM_Username'])) && ($_SESSION['MM_Username'] != "")) {

        echo "Hola, ";
        echo ObtenerNombreUsuario($_SESSION['MM_IdUsuario']);
        ?> 
</div>   

    <li><a href="usuario_cerrarsesion.php"  class="modificacionusuario">Salir</a></li>


    <?php
} else {
    ?>
    <a href="acceso.php">Iniciar Sesion</a>
    <?php
}
mysql_free_result($Recordset1);
?>