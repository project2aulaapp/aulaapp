<?php

if(isset($_SESSION["asignaturasElegidas"])){
    header("location:index.php?action=index");  
}

?>
<h1>Selecciona tus asignaturas</h1>
<p>Para ver la descripción de cada asignatura pasa el ratón por cada checkbox</p>
<form method="POST">
    <?php
    $asignaturas = new AsignaturasController();
    $asignaturas->listarAsignaturasController($_SESSION["userId"]);
    $asignaturas->elegirAsignaturasController();
?>
</form>






