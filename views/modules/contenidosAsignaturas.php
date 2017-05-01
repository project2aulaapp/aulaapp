<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>

<h1>Contenidos de la asignatura [Poner aquí nombre de la asignatura]</h1>

<?php
    
    $contenidos = new ArchivosController();
    $contenidos-> listarArchivosController($_GET["id"]);
    
    

?>


