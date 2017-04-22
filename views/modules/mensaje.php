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

?>

<h1>Enviar Mensaje</h1>

<form method="post">
	
	<input type="text" placeholder="Destinatario" name="destinatario" required>

	<input type="hidden" name="remitente" value= "<?php  echo $_SESSION['userId']; ?>">

	<input type="text" placeholder="Asunto" name="asunto" required>

	<textarea placeholder="Escribe aquí tu mensaje" name="cuerpo" required>	</textarea>

	<input type="submit" value="Enviar">
	<input type="reset" value="Limpiar">

</form>

<?php

$mensaje = new MensajesController(); 
$mensaje -> mensajeNuevoController();

if(isset($_GET["action"])){
	if ($_GET["action"] == "ok") {
		echo "Mensaje enviado.";
	}
}


?>