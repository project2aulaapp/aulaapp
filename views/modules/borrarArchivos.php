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
<section id="borrarArchivos">
<h1>Borrar archivos</h1>
<div class="archivo-borrar">
<?php

$archivos = new ArchivosController(); 
$archivos->listarArchivoBorrarController($_SESSION["userId"]);
$archivos->borrarArchivoController();

?>
   <a href="index.php" class="boton">Volver a inicio</a> 
</div>
</section>