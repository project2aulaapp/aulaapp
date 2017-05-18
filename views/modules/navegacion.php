<?php
//session_start();

if (isset($_SESSION["validar"])) {   
    
    if($_SESSION["rol"]==1){//administrador
        echo '<ul class="menu__list">
		            <li  id="autorizarU" class="menu__item"><a class="menu__link" href="index.php?action=usuarios">Autorizar Usuarios</a></li>
                <li  id="listarU" class="menu__item"><a class="menu__link" href="index.php?action=lUsuarios">Listar usuarios</a></li>		
		            <li  id="añadirU" class="menu__item"><a class="menu__link" href="index.php?action=asig">Añadir asignatura</a></li>	
                <li  id="añadirC" class="menu__item"><a class="menu__link" href="index.php?action=nCurso">Añadir curso</a></li>
                <li  id="listarC" class="menu__item"><a class="menu__link" href="index.php?action=lCursos">Listar cursos</a></li>
                <li  id="subirArchivos" class="menu__item"><a class="menu__link" href="index.php?action=subirArchivo">Subir archivos</a></li>
		            <li  id="enviarMensaje" class="menu__item"><a class="menu__link" href="index.php?action=msg">Enviar mensaje</a></li>
                <li  id="verMensajes" class="menu__item"><a class="menu__link" href="index.php?action=verMensajes">Ver mensajes</a></li>
                <li  id="perfil" class="menu__item"><a class="menu__link" href="index.php?action=perfil">Tu perfil</a></li>
                <li  id="calendario" class="menu__item"><a class="menu__link" href="index.php?action=calendario">Calendario</a></li>
                
	</ul>';
    }else if($_SESSION["rol"]==2){ //profesor
        echo '<ul class="menu__list">
              <li  id="subirApuntes" class="menu__item"><a class="menu__link" href="index.php?action=subirArchivo">Subir apuntes</a></li>
              <li  id="asignaturasProfe" class="menu__item"><a class="menu__link" href="index.php?action=asignaturasProfesor">Asignaturas profesor</a></li>
              <li  id="subirPracticas" class="menu__item"><a class="menu__link" href="index.php?action=nPracticas">Subir practicas</a></li>
              <li  id="verPracticas" class="menu__item"><a class="menu__link" href="index.php?action=practicas">Ver practicas</a></li>
              <li  id="borrarArchivos" class="menu__item"><a class="menu__link" href="index.php?action=borrarArchivos">Borrar archivos</a></li>
              <li  id="iniciarPizarra" class="menu__item"><a class="menu__link" href="index.php?action=pizarra">Iniciar pizarra</a></li>
              <li  id="enviarMensaje" class="menu__item"><a class="menu__link" href="index.php?action=msg">Enviar Mensaje</a></li>
              <li  id="verMensajes" class="menu__item"><a class="menu__link" href="index.php?action=verMensajes">Ver mensajes</a></li>
              <li  id="perfil" class="menu__item"><a class="menu__link" href="index.php?action=perfil">Ver tu perfil de usuario</a></li>
              <li  id="calendario" class="menu__item"><a class="menu__link" href="index.php?action=calendario">Calendario</a></li>
              <li class="menu__item"><a class="menu__link" href="index.php?action=practicasAlumnos">Descargar prácticas de alumnos</a></li>
              </ul>';
    }else if($_SESSION["rol"]==3){ //alumnos
        echo '<ul class="menu__list">
                <li class="menu__item"><a class="menu__link" href="index.php?action=asignaturas">Ver tus asignaturas</a></li>
                <li class="menu__item"><a class="menu__link" href="index.php?action=msg">Enviar mensaje</a></li>
                <li class="menu__item"><a class="menu__link" href="index.php?action=verMensajes">Ver mensajes</a>
                <li class="menu__item"><a class="menu__link" href="index.php?action=perfil">Tu perfil</a></li>
                <li class="menu__item"><a class="menu__link" href="index.php?action=practicas">Ver practicas</a></li>
                <li class="menu__item"><a class="menu__link" href="index.php?action=entregar">Entregar Prácticas</a></li>
                <li class="menu__item"><a class="menu__link" href="index.php?action=calendario">Calendario</a></li>
              </ul>';
    }else if($_SESSION["rol"]==4){ //Por autorizar
        echo '<ul><li><a class="menu__link" href="#">vista de usuario sin autorizar</a></li></ul>';
    }        
    
    

}
/*Habría que hacer otras visualizaciones para usuarios recién registrados sin autorización*/
?>

