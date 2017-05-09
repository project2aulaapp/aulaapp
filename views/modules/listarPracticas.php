<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>
<section id="listarPracticas"
<h1>Prácticas de la asignatura</h1>

<?php
    $contenidos = new PracticasController();
    
    if($_SESSION["rol"]==2){
      $contenidos->seleccionarAsignaturaProfeController($_SESSION["userId"]);
      if(isset($_GET["idAsig"])){
         $contenidos-> listarPracticasAsignaturaProfesorController($_SESSION["userId"],$_GET["idAsig"]); 
      }
          
    }else if($_SESSION["rol"]==3){
        $contenidos->seleccionarAsignaturaController($_SESSION["userId"]);
        if(isset($_GET["idAsig"])){
        //$contenidos->listarPracticasController($_GET["idAsig"], $_GET["idProfe"]);
        $contenidos->listarPracticasController($_GET["idAsig"]);
        }
        
      
      
    }else{
        
    }  

?>
</section>