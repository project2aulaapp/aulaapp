<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}


require_once '../../models/crud.php';

$texto = $_REQUEST["texto"];
$autor = $_SESSION["userId"];
$fecha = date('Y/m/d H:i');

if($_SESSION["rol"]==2){
	$meteDato = Datos::conectar()->prepare("INSERT INTO pizarra (texto, autor, fecha) VALUES ('$texto', '$autor', '$fecha')");
	$meteDato->execute();

	$actualizaDato = Datos::conectar()->prepare("UPDATE pizarra SET texto='$texto' WHERE autor='$autor'");
	$actualizaDato->execute();
}

?>