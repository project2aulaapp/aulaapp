<?php

if(!isset($_SESSION)){
	session_start();
}

if (!$_SESSION["validar"]) { //Esto es, si no está autenticado, lo lleva fuera y no puede editar
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

?>
<section id="detalleMensaje">
<?php
$detalleMensaje = new MensajesController();
$detalleMensaje->verMensajeDetalleController();
?>
</section>