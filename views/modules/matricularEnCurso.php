<?php
if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

echo "datos de depuración:<br>";
echo "userID: " . $_SESSION["userId"] . "<br>";
echo "rolID: " . $_SESSION["rol"] . "<br>";
echo "Usuario: " . $_SESSION["usuario"] . "<br>";
echo "Matriculado: " . $_SESSION["inscrito"];



if ($_SESSION["inscrito"] == 1 || $_SESSION["rol"] == 1) { //si ya está inscrito lo llevamos al index o es administrador    
    header("location:index.php?action=index");
} else {  // La primera vez que entremos después de registrarnos, nos pedirá que 
    //nos matriculemos en un curso
    echo '<h1>Inscripción a un nuevo curso</h1>';
    ?>
    <form method="POST">
    <?php
    $curso = new CursosController();
    $curso->desplegableCursosController();
    $curso->inscribirEnCursoController();
    ?> 
    </form>


<?php }
?>