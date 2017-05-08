<?php
if(!isset($_SESSION)){
	session_start();
}


if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

if(($_SESSION["rol"] == 1) || ($_SESSION["rol"] == 2) ){ //si no es profesor (rol 2) o administrador (rol 1) lo lleva fuera

}else{
    header("location:index.php?action=index");
}

?>

<section id="archivoNuevo">
<h1>Subida de archivos al servidor</h1>

<form enctype="multipart/form-data"  method="POST">
    <?php

$archivo = new ArchivosController();
$archivo ->archivoNuevoController();

?>
</form>


</section>