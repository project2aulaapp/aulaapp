<?php
//session_start();

if (isset($_SESSION["validar"])) {
    /* Navegación de un administrador, lo puede ver todo, editar y borrar, excepto mensajes ajenos y demás que no le concierna*/
    
    if($_SESSION["rol"]==1){
        echo '<ul>			
		<li><a href="index.php?action=usuarios">Autorización de Usuarios</a></li>
		<li><a href="index.php?action=msg">Mensajes</a></li>		
		<li><a href="index.php?action=asig">Añadir asignatura</a></li>	
                <li><a href="index.php?action=nCurso">Añadir curso</a></li>
                <li><a href="index.php?action=lCursos">Listar cursos</a></li>
                <li><a href="index.php?action=verMensajes">Ver mensajes</a></li>
                <li><a href="index.php?action=lUsuarios">Listar usuarios</a></li>
                <li><a href="index.php?action=perfil">Ver tu perfil de usuario</a></li>
                <li><a href="index.php?action=subirArchivo">Subir archivos al servidor</a></li>
	</ul>';
    }else if($_SESSION["rol"]==2){ //profesor
        echo '<ul><li><a href="#">Vista de profesor</a></li>
              <li><a href="index.php?action=msg">Mensajes</a></li>
              <li><a href="index.php?action=verMensajes">Ver mensajes</a></li>
              <li><a href="index.php?action=perfil">Ver tu perfil de usuario</a></li>
              <li><a href="index.php?action=subirArchivo">Subir apuntes al servidor</a></li>
              <ul>';
    }else if($_SESSION["rol"]==3){ //alumnos
        echo '<ul><li><a href="#">Vista de alumno</a></li>
        <li><a href="index.php?action=msg">Mensajes</a></li><ul>
        <li><a href="index.php?action=verMensajes">Ver mensajes</a>
        <li><a href="index.php?action=perfil">Ver tu perfil de usuario</a></li>
        <li><a href="index.php?action=asignaturas">Ver tus asignaturas</a></li>
        </li>';
    }else if($_SESSION["rol"]==4){ //Por autorizar
        echo '<ul><li><a href="#">vista de usuario sin autorizar</a></li><ul>';
    }        
    
    

}
/*Habría que hacer otras visualizaciones para usuarios recién registrados sin autorización*/
?>



