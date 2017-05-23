
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
<h1>Descarga de prácticas de alumnos</h1>

<?php

$practicasAlumnos = new PracticasController();
$practicasAlumnos->listarPracticasEntregadasController();

?>



</section>
