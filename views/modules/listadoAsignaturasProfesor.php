<?php
if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

/*
if(isset($_SESSION["asignaturasElegidas"]) && $_SESSION["asignaturasElegidas"] == 1 && $_SESSION["rol"] == 1 && $_SESSION["rol"] == 2 ){
    header("location:index.php?action=index");  
}*/

?>
<h1>Selecciona las asignaturas que vas a impartir</h1>
<p>Para ver la descripción de cada asignatura pasa el ratón por cada checkbox</p>
<form method="POST">
    <?php
    $asignaturas = new AsignaturasController();
    $asignaturas->profesorAsignaturasController();
    $asignaturas->elegirAsignaturasProfesorController($_SESSION["userId"]);
?>
</form>
