<?php
//session_start();

if (isset($_SESSION["validar"])) {   
    
    if($_SESSION["rol"]==1){//administrador
        echo '<ul class="menu">
                <li  id="inicio"><a href="index.php?action=index">Inicio</a></li><li>   
                    <label for="drop-1" class="toggle">Usuarios &#8681;</label>
                    <a href="#">Usuarios &#8681;</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li  id="autorizarU"><a href="index.php?action=usuarios">Autorizar Usuarios</a></li>
                        <li  id="listarU"><a href="index.php?action=lUsuarios">Listar usuarios</a></li> 
                    </ul> 

                </li>	
		            <li  id="añadirU"><a href="index.php?action=asig">Añadir asignatura</a></li>
                <li>   
                    <label for="drop-2" class="toggle">Cursos &#8681;</label>
                    <a href="#">Cursos &#8681;</a>
                    <input type="checkbox" id="drop-2"/>
                    <ul>
                        <li  id="añadirC"><a href="index.php?action=nCurso">Añadir curso</a></li>
                        <li  id="listarC"><a href="index.php?action=lCursos">Listar cursos</a></li>
                    </ul> 

                </li>
                <li>   
                    <label for="drop-3" class="toggle">Mensajes  &#8681;</label>
                    <a href="#">Mensajes &#8681;</a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li  id="enviarMensaje"><a href="index.php?action=msg">Enviar mensaje</a></li>
                        <li  id="verMensajes"><a href="index.php?action=verMensajes">Ver mensajes</a></li>
                    </ul> 

                </li>
                <li  id="perfil"><a href="index.php?action=perfil">Perfil</a></li>
                <li  id="calendario"><a href="index.php?action=calendario">Calendario</a></li>
                </ul>';
    }else if($_SESSION["rol"]==2){ //profesor
        echo '<ul class="menu">
              <li  id="inicio"><a href="index.php?action=index">Inicio</a></li>
              <li>   
                    <label for="drop-0" class="toggle">Archivos &#8681;</label>
                    <a href="#">Archivos &#8681;</a>
                    <input type="checkbox" id="drop-0"/>
                    <ul>
                      <li  id="subirApuntes"><a href="index.php?action=subirArchivo">Subir apuntes</a></li>
                      <li  id="borrarArchivos"><a href="index.php?action=borrarArchivos">Borrar archivos</a></li>
                    </ul> 

                </li>
              <li>   
                    <label for="drop-1" class="toggle">Prácticas &#8681;</label>
                    <a href="#">Prácticas &#8681;</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                        <li  id="subirPracticas"><a href="index.php?action=nPracticas">Subir practicas</a></li>
                        <li  id="verPracticas"><a href="index.php?action=practicas">Ver practicas</a></li>
                        <li><a href="index.php?action=practicasAlumnos">Prácticas de alumnos</a></li>
                    </ul> 

              </li>
              <li  id="iniciarPizarra"><a href="index.php?action=pizarra">Iniciar pizarra</a></li>
              <li>   
                    <label for="drop-3" class="toggle">Mensajes &#8681;</label>
                    <a href="#">Mensajes &#8681;</a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li  id="enviarMensaje"><a href="index.php?action=msg">Enviar mensaje</a></li>
                        <li  id="verMensajes"><a href="index.php?action=verMensajes">Ver mensajes</a></li>
                    </ul> 

                </li>
                <li>   
                    <label for="drop-4" class="toggle">Perfil &#8681;</label>
                    <a href="#">Perfil &#8681;</a>
                    <input type="checkbox" id="drop-4"/>
                    <ul>
                        <li  id="asignaturasProfe"><a href="index.php?action=asignaturasProfesor">Asignaturas</a></li>
                        <li  id="perfil"><a href="index.php?action=perfil">Tu perfil</a></li>
                    </ul> 

                </li>
              <li  id="calendario"><a href="index.php?action=calendario">Calendario</a></li>
              </ul>';
    }else if($_SESSION["rol"]==3){ //alumnos
        echo '<ul class="menu">
                <li  id="inicio"><a href="index.php?action=index">Inicio</a></li>
                <li><a href="index.php?action=asignaturas">Asignaturas</a></li>
                 <li>   
                    <label for="drop-1" class="toggle">Prácticas &#8681;</label>
                    <a href="#">Prácticas &#8681;</a>
                    <input type="checkbox" id="drop-1"/>
                    <ul>
                      <li><a href="index.php?action=practicas">Ver practicas</a></li>
                      <li><a href="index.php?action=entregar">Entregar Prácticas</a></li>
                    </ul> 

                </li>
                <li>   
                    <label for="drop-3" class="toggle">Mensajes &#8681;</label>
                    <a href="#">Mensajes &#8681;</a>
                    <input type="checkbox" id="drop-3"/>
                    <ul>
                        <li  id="enviarMensaje"><a href="index.php?action=msg">Enviar mensaje</a></li>
                        <li  id="verMensajes"><a href="index.php?action=verMensajes">Ver mensajes</a></li>
                    </ul> 

                </li>
                <li><a href="index.php?action=perfil">Perfil</a></li>
                <li><a href="index.php?action=calendario">Calendario</a></li>
              </ul>';
    }else if($_SESSION["rol"]==4){ //Por autorizar
        echo '<ul><li><a href="#">vista de usuario sin autorizar - Deberás esperar a que un administrador te autorice el acceso a los contenidos </a></li></ul>';
    }        
    
    

}
/*Habría que hacer otras visualizaciones para usuarios recién registrados sin autorización*/
?>

