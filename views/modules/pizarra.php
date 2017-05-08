<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}


require_once '/../../models/crud.php'; //requiero el archivo para tener acceso a la clase Datos y su método conectar
/*
$pizarraNueva = Datos::conectar()->prepare("INSERT INTO pizarra(texto, autor, fecha) VALUES ('".$_REQUEST["texto"]."',".$_SESSION["userId"].",NOW())");
$pizarraNueva->execute();

$datos = Datos::conectar()->prepare("SELECT * FROM pizarra WHERE autor=".$_SESSION["userId"]." ORDER BY fecha DESC LIMIT 1");
$datos->execute();
$datos->fetch();*/
    //Mañana seguiré    
?>

<section id="pizarra">
         
<h1>Pizarra</h1>



<textarea id="pizarra" name="texto">
    

</textarea>


<script type="text/javascript" src="src/javascript/ajax/pizarra.js"></script>
</section>