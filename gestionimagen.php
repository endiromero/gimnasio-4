<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Imagen</title>
</head>

<body>
<?php
// Todo para el propietario, lectura y ejecucion para los otros
chmod("gestionimagen.php", 0777);
?>
<!-- Guardamos las imagenes en la ruta /screenshots/rutinas/-->
<?php if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form1")) {
	$nombre_archivo = $_FILES['userfile']['name']; 
	move_uploaded_file($_FILES['userfile']['tmp_name'], "/screenshots/rutinas/".$nombre_archivo);
	
	?>
<!-- Cierra la ventana de gestion y sube la imagen a la base de datos -->
    <script>
		opener.document.form1.RutAsignada1.value="<?php echo $nombre_archivo; ?>";
		self.close();
	</script>
    <?php
}
else
{?>

<!--Formulario de Seleccionar y Subir la Imagen -->
<form action="gestionimagen.php" method="post" enctype="multipart/form-data" id="form1">

  <p>
    <input name="userfile" type="file" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Subir Imagen" />
  </p>
  <input type="hidden" name="enviado" value="form1" />
</form>
<?php }?>
</body>
</html>