<?php

if(isset($_SESSION["asignaturasElegidas"])){
    header("location:index.php?action=index");  
}

?>
<h1>Selecciona tus asignaturas</h1>

<form method="POST">
    <?php
    $asignaturas = new AsignaturasController();
    $asignaturas->listarAsignaturasController();
    $asignaturas->elegirAsignaturasController();
?>
    
    
    
</form>






