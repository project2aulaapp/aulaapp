<?php

/**
 * 	Controlador de cursos
 */
class CursosController extends MvcController {

    public function cursoNuevoController() {
        if (isset($_POST["nbCurso"])) {
            $datosController = array("curso" => $_POST["nbCurso"]);

            $respuesta = CursosModel::cursoNuevoModel($datosController, "curso");

            if ($respuesta == "ok") {
                echo '<div class="both correct">Nuevo curso guardado correctamente.</div>';
            } else {
                echo '<div class="both incorrect">Ocurrió algún problema, vuelva a intentarlo.</div>';
            }
        }
    }
    
    
    
    public function listarCursosController(){

		$respuesta = CursosModel::listarCursosModel("curso");

		foreach ($respuesta as $fila => $item) {
			echo'<tr>
				<td>'.$item["nombreCurso"].'</td>
				<td><a href="index.php?action=lCursos&idCurso='.$item["idCurso"].'"><button>Borrar</button></a></td>
			</tr>';
		}	
                return true;
             
	}
        
        # función para que me haga un desplegable de cursos disponibles
        
        public function desplegableCursosController() {
        $respuesta = CursosModel::listarCursosModel();
        echo '<form method="POST">';
        echo '<select name="idCurso">'; 
        foreach ($respuesta as $fila => $item) 
            {                   
              echo '<option  value="'.$item["idCurso"].'">'.$item["nombreCurso"].'</option>';       
            }
        echo '</select><input type="submit" value="Matricular">
            </form> ';
        
       
        
        }
        
        
        public function listadoCursosController(){
            $respuesta = CursosModel::listarCursosModel();
        
        echo '<select name="cursoAsignatura">'; 
        foreach ($respuesta as $fila => $item) 
            {                   
              echo '<option  value="'.$item["idCurso"].'">'.$item["nombreCurso"].'</option>';       
            }
        echo '</select>';
        }
        
        
        # Con esta función lo que hacemos es que nos inscribimos en un curso una 
        # vez que nos hayamos registrado y nos hayan aprobado el registro
        
        public function inscribirEnCursoController(){
            if(isset($_POST["idCurso"])){
                $idCursoController = $_POST["idCurso"];
                $idUsuarioController = $_SESSION["userId"];
			$respuesta = CursosModel::inscribirEnCursosModel($idCursoController,$idUsuarioController);
                        
                        //var_dump($respuesta);
                        
			if ($respuesta == "ok") {
				header("location:index.php?action=seleccionAsignaturas");
			}else{
                            echo '<div class="both incorrect">Algo falló</div>';
                        }
            }
        }
        
        # Función para borrar un curso
        
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
