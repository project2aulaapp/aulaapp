<?php

/**
 * 	Controlador de cursos
 */
class CursosController extends MvcController {

    public function cursoNuevoController() {
        if (isset($_POST["nbCurso"])) {
            $datosController = array("curso" => $_POST["nbCurso"]);

            $respuesta = CursosModel::cursoNuevoModel($datosController, "curso");

            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Nuevo curso grabado!";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }
        }
    }
    
    
    
    public function listarCursosController(){

		$respuesta = CursosModel::listarCursosModel("curso");

		foreach ($respuesta as $fila => $item) {
			echo'<tr>
				<td>'.utf8_encode($item["nombreCurso"]).'</td>				
				<td><a href="index.php?action=editarCurso&idCurso='.$item["idCurso"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=lCursos&idCurso='.$item["idCurso"].'"><button>Borrar</button></a></td>
			</tr>';
		}		
	}
        
        
        
        public function borrarCursoController(){
		if(isset($_GET["idCurso"])){
			
			$datosController = $_GET["idCurso"];
			$respuesta = CursosModel::borrarCursoModel($datosController,"curso");
			if ($respuesta == "ok") {
				header("location:index.php?action=lCursos");
			}
		}
	}
        
        
        
        
        

}
