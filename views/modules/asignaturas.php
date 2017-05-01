<?php

if(!isset($_SESSION)){
	session_start();
}
if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>



<h1>Ir a una asignatura</h1>
<p>Haz clic en una de las asignaturas para acceder a su contenido</p>

<div class="contenedor-asignaturas">
    <?php
    $mensaje = new AsignaturasController(); 
    $mensaje ->cargarAsignaturasController($_SESSION["userId"]);
    ?>
    
    
   
<!--
    <div class="btn-asignatura">
        <h1>Asignatura2</h1>  
        <p>Bla bla bla hablando de la asignatura</p>
        <center><button>Acceder</button></center>
    </div>

    <div class="btn-asignatura">
        <h1>Asignatura3</h1>  
        <p>Bla bla bla hablando de la asignatura</p>
        <center><button>Acceder</button></center>
    </div>

    <div class="btn-asignatura">
        <h1>Asignatura4</h1> 
        <p>Bla bla bla hablando de la asignatura</p>
        <center><button>Acceder</button></center>
    </div>

    <div class="btn-asignatura">
        <h1>Asignatura5</h1>   
        <p>Bla bla bla hablando de la asignatura</p>
        <center><button>Acceder</button></center>
    </div>

    <div class="btn-asignatura">
        <h1>Asignatura6</h1> 
        <p>Bla bla bla hablando de la asignatura</p>
        <center><button>Acceder</button></center>
    </div>
-->
</div>




