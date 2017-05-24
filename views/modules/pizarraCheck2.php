<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}


require_once '../../models/crud.php';

if($_SESSION["rol"]==3){
	$verDato = Datos::conectar()->prepare("SELECT texto from pizarra");
	$verDato->execute();

	$resultado = $verDato->fetch();

	echo $resultado['texto'];
}

?>