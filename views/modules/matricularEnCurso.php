<?php
#este bloque comprueba que esté logueado para seguir con la carga de la página, sino está logueado lo manda a loguearse
if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}


#este bloque comprueba si está inscrito en algún curso (excepto profesores y administradores) que no tienen que completar este proceso

if ($_SESSION["inscrito"] == 1 && $_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) { //si ya está inscrito o es administrador lo llevamos al index   
    /*if (($_SESSION["inscritoAsignaturas"] < 1) && $_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) {*/
    if ($_SESSION["inscritoAsignaturas"] < 1) { // si tiene pendiente seleccionar asignaturas... lo manda a seleccionar
        header("location:index.php?action=seleccionAsignaturas");
    } else {
        header("location:index.php?action=index"); // si ya está todo listo, lo manda a la página inicial
    }
} else {  // La primera vez que entremos después de registrarnos, nos pedirá que 
    //nos matriculemos en un curso
    if ($_SESSION["rol"] != 1 && $_SESSION["rol"] != 2) {
        echo '<section id="inscribirEnCurso">';
        echo '<h1>Inscripción a un nuevo curso</h1>';
        echo '<form method="POST">';
        $curso = new CursosController();
        $curso->desplegableCursosController();
        $curso->inscribirEnCursoController();
        echo '</form></section>';
        
    } else {
        header("location:index.php?action=index");
    }
}
?>