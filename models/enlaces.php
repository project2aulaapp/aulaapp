<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "login" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registro"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/inicio.php";
		
		}
		
                else if($enlaces == "verDetalle"){

			$module =  "views/modules/detalleMensaje.php";
		
		}
                
                else if($enlaces == "practicasAlumnos"){

			$module =  "views/modules/seleccionarPracticasAlumno.php";
		
		}
                
                 else if($enlaces == "borrarPractica"){

			$module =  "views/modules/borrarPractica.php";
		
		}
              
                
                else if($enlaces == "entregar"){

			$module =  "views/modules/entregarPracticas.php";
		
		}
                
                else if($enlaces == "practicas"){

			$module =  "views/modules/listarPracticas.php";
		
		}
                
                else if($enlaces == "nPracticas"){

			$module =  "views/modules/nuevaPractica.php";
		
		}
                
                else if($enlaces == "contenidos"){

			$module =  "views/modules/contenidosAsignaturas.php";
		
		}
                
                else if($enlaces == "pizarra"){

			$module =  "views/modules/pizarra.php";
		
		}
                
                else if($enlaces == "calendario"){

			$module =  "views/modules/calendario.php";
		
		}
                
                else if($enlaces == "asignaturas"){

			$module =  "views/modules/asignaturas.php";		
		}
               
                else if($enlaces == "borrarArchivos"){

			$module =  "views/modules/borrarArchivos.php";		
		}
                
                else if($enlaces == "asignaturasProfesor"){

			$module =  "views/modules/listadoAsignaturasProfesor.php";		
		}
                
                
                else if($enlaces == "seleccionAsignaturas"){

			$module =  "views/modules/seleccionAsignaturas.php";
		
		}
                
                 else if($enlaces == "subirArchivo"){

			$module =  "views/modules/nuevoArchivo.php";
		
		}
                
                else if($enlaces == "matricular"){

			$module =  "views/modules/matricularEnCurso.php";
		
		}
                
                else if($enlaces == "perfil"){

			$module =  "views/modules/verPerfil.php";
		
		}
                
                else if($enlaces == "editarPerfil"){

			$module =  "views/modules/editar.php";
		
		}
                
                
                else if($enlaces == "lUsuarios"){

			$module =  "views/modules/listadoUsuarios.php";
		
		}

		
                else if($enlaces == "verMensajes"){

			$module =  "views/modules/verMensajes.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/login.php";
		
		}

		else if($enlaces == "msg"){

			$module =  "views/modules/mensaje.php";
		
		}

		else if($enlaces == "asig"){

			$module =  "views/modules/asignaturaNueva.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/login.php";
		
		}
                else if($enlaces == "nCurso"){

			$module =  "views/modules/cursoNuevo.php";
		
		}
                
                 else if($enlaces == "lCursos"){

			$module =  "views/modules/listarCursos.php";
		
		}            
                

		else{

			$module =  "views/modules/error.php";

		}
		
		return $module;

	}

}

?>
