<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>

<section id="listaAsignaturas">

<h1>Ir a una asignatura</h1>
<p>Haz clic en una de las asignaturas para acceder a su contenido</p>

<div class="contenedor-asignaturas">
    <?php
    $mensaje = new AsignaturasController(); 
    $mensaje ->cargarAsignaturasController($_SESSION["userId"]);
    ?>
    
</div>


</section>

