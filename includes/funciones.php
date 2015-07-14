<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*====Funcion Para Obtener el Nombre del usuario en el Inicio de Sesión=====*/
function ObtenerNombreUsuario($identificador)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_ConsultaFuncion = sprintf("SELECT usuario.Nombre FROM usuario WHERE usuario.id_Usuario = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexion) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	//Retornamos el Nombre del Usuario
	return $row_ConsultaFuncion['Nombre']; 
	mysql_free_result($ConsultaFuncion);
}