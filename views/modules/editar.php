<?php
session_start();

if (!$_SESSION["validar"]) {
	header("location:index.php?action=ingresar");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

?>



<h1>EDITAR USUARIO</h1>

<form method="post" action="">
<?php
$editarUsuario = new UsuariosController();
$editarUsuario->editarUsuarioController();
$editarUsuario->actualizarUsuarioController();
?>	
</form>


