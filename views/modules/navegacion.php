<?php
//session_start();

if (isset($_SESSION["validar"])) {
    /* Navegación de un administrador, lo puede ver todo, editar y borrar, excepto mensajes ajenos y demás que no le concierna*/
echo '<ul>			
		<li><a href="index.php?action=usuarios">Usuarios</a></li>
		<li><a href="index.php?action=msg">Mensajes</a></li>		
		<li><a href="index.php?action=asig">Añadir asignatura</a></li>	
                <li><a href="index.php?action=nCurso">Añadir curso</a></li>
                <li><a href="index.php?action=lCursos">Listar cursos</a></li>
                <li><a href="index.php?action=verMensajes">Ver mensajes</a></li>
	</ul>';
}
/*Habría que hacer otras visualizaciones para usuarios recién registrados sin autorización*/
?>



