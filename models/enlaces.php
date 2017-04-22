<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "login" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "registro"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/inicio.php";
		
		}

		
                else if($enlaces == "verMensajes"){

			$module =  "views/modules/verMensajes.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
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