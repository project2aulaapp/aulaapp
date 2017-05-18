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
                "curso" => $_POST["cursoAsignatura"]
            );

            $respuesta = AsignaturaModel::asignaturaNuevaModel($datosController, "asignatura");


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                //echo "Asignatura grabada!";
                echo '<div class="info"><div class="success">¡Asignatura grabada!</div></div>';
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }
        }
    }

    public function listarAsignaturasController($idAlumno) {  
            $idCurso = AsignaturaModel::asignaturasCursoModel($idAlumno);
           // var_dump($idCurso);
            $respuesta = AsignaturaModel::listarAsignaturasModel($idCurso["idCurso"]);           
            //var_dump($respuesta);
            foreach ($respuesta as $fila => $item) {//aquí los recorro, como quiero una lista de inputs tipo checkbox pues lo hago así
                echo '<input type="checkbox" value="'.$item["id"].'" name="asignaturas[]" title="'.$item["descripcion"].'">'.$item["nombre"].'<br>';
            }
            echo '<input type="submit" value="Enviar">';
    }
    
    
    
    
    
    
    
    public function elegirAsignaturasController(){ //seleccion de asignaturas del alumno
            if (isset($_POST["asignaturas"]) && $_POST["asignaturas"]>0) {
                       
            $datosController=$_POST['asignaturas'];    
                              
            
            //var_dump($datosController);
            $respuesta = AsignaturaModel::eleccionAsignaturasModel($datosController, $_SESSION["userId"]);


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                header("location:index.php?action=index");
                //echo "Asignaturas elegidas!";
            } else {
                //header("location:index.php");
               echo 'errorrr';
                    }
        }
        
                
                echo "<script> alert('Debes elegir al menos una asignatura'); </script>";
       
    }
    
    #   Función para que un profesor se apunte a sus asignaturas
    
    public function profesorAsignaturasController(){
        $respuesta = AsignaturaModel::listadoAsignaturasProfesorModel();           
            
            foreach ($respuesta as $fila => $item) {//aquí los recorro, como quiero una lista de inputs tipo checkbox pues lo hago así
                echo '<div><input type="checkbox" value="'.$item["id"].'" name="asignaturas[]" title="'.$item["descripcion"].'"><label>'.$item["nombre"].'</label></div><br>';
            }
            echo '<input type="submit" value="Enviar">';
    }
    
    
    
    public function elegirAsignaturasProfesorController($id){
            if (isset($_POST["asignaturas"]) && $_SESSION["rol"]=2) {
                       
            $datosController=$_POST['asignaturas'];    
                              
            
            //var_dump($datosController);
            $respuesta = AsignaturaModel::eleccionAsignaturasProfesorModel($datosController, $_SESSION["userId"]);


            //var_dump($respuesta);
            if ($respuesta == "ok") {                
                echo "<script>alert('Asignaturas elegidas!'); window.location='index.php?action=index';</script>";
                
                //header("location:index.php?action=index");
            } else {
                //header("location:index.php");
               
                    }
        } 
    }
    
    
    public function cargarAsignaturasController($id){
        
        $respuesta = AsignaturaModel::cargarAsignaturasModel($id);
        
       foreach ($respuesta as $fila => $item) {
                echo '<div class="btn-asignatura">';
                echo '<a href=index.php?action=contenidos&id='.$item["id"].'>';
                echo '<h1>'.ucfirst($item["nombre"]).'</h1>';
                echo '<p>'.$item["descripcion"].'</p>';
                echo'</a>';
                echo '</div>';
            }
              
               
    }
    
    
   
    
    
    

}//fin clase
?>