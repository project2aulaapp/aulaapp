<?php

/**
 * Modelo para la creación de nuevas asignaturas
 */
class AsignaturaModel extends Datos {

    public function asignaturaNuevaModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, horas, descripcion, IDprofesor, curso) VALUES (:nombre, :horas, :descripcion, :IDprofesor, :curso)");

        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":IDprofesor", $datosModel["profesor"], PDO::PARAM_INT);
        $stmt->bindParam(":curso", $datosModel["curso"], PDO::PARAM_INT);
        //$stmt->execute();
        //var_dump($stmt);

        if ($stmt->execute()) {

            return "ok";
        } else {
            return "ko";
        }

        $stmt->close(); //cerramos la conexión cuando hemos terminado.			
    }

// fin asgignaturaNuevaModel()
    
    
     public function listarAsignaturasModel(){
         $stmt = Conexion::conectar()->prepare("SELECT * FROM asignatura WHERE curso=2");
         
        $stmt->execute();
        
        return $stmt->fetchAll();
        
        $stmt-close();
        
    }
    
    
    
    
    public function eleccionAsignaturasModel($datosModel,$id){   
            
            $values = '';            
            $longitud = count($datosModel);
            
            for($i=0 ; $i<$longitud ; $i++){
                if($i<($longitud-1)){
                 $values = ',('.$datosModel[$i].', '.$id.')'.$values;   
                }else{
                    $values = '('.$datosModel[$i].', '.$id.')'.$values;
                }
                
            }  
       
        //echo $values;
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO alumnoasignatura (idAsignatura, idAlumno) VALUES $values");
        
        
        if ($stmt->execute()){ 
            $_SESSION["asignaturasElegidas"]=true; // si ya ha elegido asignaturas se crea esta variable de sesión para que no pueda volver a elegirlas
            return "ok";
        } else {
            return "ko";
        }
        $stmt->close();
         
         
    }
    
    
    
    
   
    
    
}

?>