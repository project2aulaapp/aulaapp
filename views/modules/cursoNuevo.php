
<?php

if(!isset($_SESSION)){
	session_start();
}

echo "datos de depuración:<br>";
echo "userID: ".$_SESSION["userId"]."<br>";
echo "rolID: ". $_SESSION["rol"];

if (!$_SESSION["validar"]) {
	header("location:index.php?action=ingresar");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

if(($_SESSION["rol"] == 1) || ($_SESSION["rol"] == 2) ){ //si no es profesor (rol 2) o administrador (rol 1) lo lleva fuera

}else{
    header("location:index.php?action=index");
}

?>

<h1>Añadir curso</h1>

<form method="post">
	
	<input type="text" placeholder="Nombre del curso" name="nbCurso" required>
	<input type="submit" value="Enviar">
	<input type="reset" value="Limpiar">

</form>

<?php

$mensaje = new CursosController(); 
$mensaje ->cursoNuevoController();

if(isset($_GET["action"])){
	if ($_GET["action"] == "ok") {
		echo "Curso añadido.";
	}
}


?>