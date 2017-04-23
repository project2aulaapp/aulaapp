<?php
if (!$_SESSION["validar"]) {
	header("location:index.php?action=ingresar");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>

<h1>Perfil de usuario</h1>

<?php
    $perfil = new UsuariosController();
    $perfil -> verPerfilUsuarioController();

?>