<?php
session_start();

if (!isset($_SESSION["validar"])) {
	
	/*Navegación para cuando no estemos logueados o registrados*/
echo ' 	
	<a href="index.php"><img src="img/logotipo.jpeg"></a>
	<ul>			
		<li><a href="index.php?action=login">Login</a></li>
		<li><a href="index.php?action=registro">Registro</a></li>
	</ul>

	';
	
	//exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}else{
    /* Navegación de un administrador, lo puede ver todo, editar y borrar, excepto mensajes ajenos y demás que no le concierna*/
echo '
	<a href="index.php"><img src="img/logotipo.jpeg"></a>
	<ul>			
		<li><a href="index.php?action=usuarios">Usuarios</a></li>
		<li><a href="index.php?action=msg">Mensajes</a></li>		
		<li><a href="index.php?action=asig">Añadir asignatura</a></li>	
                <li><a href="index.php?action=nCurso">Añadir curso</a></li>
                <li><a href="index.php?action=lCursos">Listar cursos</a></li>
                <li><a href="index.php?action=verMensajes">Ver mensajes</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
	</ul>

';
}
/*Habría que hacer otras visualizaciones para usuarios recién registrados sin autorización*/
?>



