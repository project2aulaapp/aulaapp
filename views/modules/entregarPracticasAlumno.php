<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}


?>



<h1>Entrega de prácticas</h1>


<form enctype="multipart/form-data"  method="POST">
    <?php

$practicas = new PracticasController();

$practicas->subirPracticaAlumnoController($_SESSION["userId"]);

?>
</form>


