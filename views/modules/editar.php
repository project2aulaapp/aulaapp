<?php

if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>
<section id="editarUsuario">
<h1>EDITAR USUARIO</h1>

<form method="post" action="">
<?php
$editarUsuario = new UsuariosController();
$editarUsuario->editarUsuarioController();
$editarUsuario->actualizarUsuarioController();
?>	
</form>


</section>