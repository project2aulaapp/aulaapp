<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>
<section id="listarPracticas">


<?php
    $contenidos = new PracticasController();
    
    
   if($_SESSION["rol"]==2){
       //echo '<p>profe</p>';
      $contenidos->listarPracticasProfesorController($_SESSION["userId"]);
      }          
    if($_SESSION["rol"]==3){
        //echo '<p>alumno</p>';
        $contenidos->listarPracticasAlumnoController($_SESSION["userId"]);
    }

?>
</section>