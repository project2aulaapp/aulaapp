<?php
	/**
	* 	Controlador de asignaturas
	*/
	class AsignaturasController extends MvcController{
            
		public function asignaturaNuevaController(){
			if(isset($_POST["nbAsignatura"])){
				$datosController = array("nombre"=>$_POST["nbAsignatura"],
							"horas"=>$_POST["horasAsignatura"],
							"descripcion"=>$_POST["descripcionAsignatura"],
							"profesor"=>$_POST["profesorAsignatura"],
							"curso"=>$_POST["cursoAsignatura"]
							);

			$respuesta = AsignaturaModel::asignaturaNuevaModel($datosController,"asignatura");
                      
                                
			//var_dump($respuesta);
			if ($respuesta=="ok") {
				//header("location:index.php?action=ok");
				echo "Asignatura grabada!";
			}else{
				//header("location:index.php");
				echo "maaaaaaal!";
			}

			}
		}
		
	}





?>