
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

<section id="practicasAlumnos">
<h1>Listado de las prácticas de alumno</h1>


<?php 
    $practicas = new PracticasController();
    $practicas->listarPracticasController($_GET["idAsignatura"], $_GET["idUsuario"]);
// aquí llegaremos cuando seleccionen un alumno para ver las prácticas que tiene hechas

?>
</section>