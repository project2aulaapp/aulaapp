<?php

/**
 * 	Controlador de asignaturas
 */
class AsignaturasController extends MvcController {

    public function asignaturaNuevaController() {
        if (isset($_POST["nbAsignatura"])) {
            $datosController = array("nombre" => $_POST["nbAsignatura"],
                "horas" => $_POST["horasAsignatura"],
                "descripcion" => $_POST["descripcionAsignatura"],
                "profesor" => $_POST["profesorAsignatura"],
                "curso" => $_POST["cursoAsignatura"]
            );

            $respuesta = AsignaturaModel::asignaturaNuevaModel($datosController, "asignatura");


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Asignatura grabada!";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }
        }
    }

    public function listarAsignaturasController() {        
            $respuesta = AsignaturaModel::listarAsignaturasModel(); //pido datos al servidor           
            //var_dump($respuesta);
            foreach ($respuesta as $fila => $item) {//aquí los recorro, como quiero una lista de inputs tipo checkbox pues lo hago así
                echo '<input type="checkbox" value="'.$item["id"].'" name="asignaturas">'.$item["nombre"].'<br>';
            }
            echo '<input type="submit" value="Enviar" name="enviar">';
    }
    
    
    /* Esto no funciona aún, elegirAsignaturasController
    */
    
    
    
    
    public function elegirAsignaturasController(){
            if (isset($_POST["asignaturas"])) {
            $datosController=array();
            
            $datosController['asignatura']=$_POST['asignaturas'];    
                              
            
            var_dump($datosController);
            $respuesta = AsignaturaModel::eleccionAsignaturaModel($datosController, $_SESSION["userId"]);


            var_dump($respuesta);
            /*if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Asignatura grabada!";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }*/
        }else{
            echo "nada";
        }
       
    }

}//fin clase
?>