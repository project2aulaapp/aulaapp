<?php

/**
 * Modelo para la creación de nuevas asignaturas
 */
class AsignaturaModel extends Datos {

    public function asignaturaNuevaModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, horas, descripcion, curso) VALUES (:nombre, :horas, :descripcion, :curso)");

        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_INT);
        $stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
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
    #   Función que recibe el id del alumno para obtener el id del curso al que pertenece

    public function asignaturasCursoModel($idAlumno) {
        $stmt = Conexion::conectar()->prepare("SELECT idCurso FROM usuariocurso WHERE idUsuario=$idAlumno");
        //var_dump($idAlumno);
        $stmt->execute();
        //var_dump($stmt);
        return $stmt->fetch();

        $stmt - close();
    }

    #   Función que recibe el id del curso para obtener una lista de asignaturas que correspondan a un curso concreto

    public function listarAsignaturasModel($idCurso) { 
        //var_dump($idCurso);
        $stmt = Conexion::conectar()->prepare("SELECT * FROM asignatura WHERE curso=$idCurso");

        $stmt->execute();
        //var_dump($stmt);

        return $stmt->fetchAll();

        $stmt - close();
    }

    public function eleccionAsignaturasModel($datosModel, $id) { //alumno tiene que seleccionar asignaturas para ver su contenido

        $values = ' ';     
        
        
        $longitud = count($datosModel);
        #este bucle es para preparar la sentencia del insert en alumnoasignatura
        for ($i = 0; $i < $longitud; $i++) {
           if ($i == ($longitud-1)) {
           $values = $values.'('.$datosModel[$i].', '.$id.')';
           }else{
            $values = $values.'('.$datosModel[$i].', '.$id.'),';
           }
           
        }
        

        //echo $values;

        $stmt = Conexion::conectar()->prepare("INSERT INTO alumnoasignatura (idAsignatura, idAlumno) VALUES ". $values.';');


        if ($stmt->execute()) {
            $_SESSION["asignaturasElegidas"] = true; // si ya ha elegido asignaturas se crea esta variable de sesión para que no pueda volver a elegirlas
            
            $actualizacion = Conexion::conectar()->prepare('UPDATE usuario set inscritoAsignaturas=1 WHERE id=' . $id); //y actualizamos que ya ha elegido asignaturas
            $actualizacion->execute();
            $_SESSION["asignaturasElegidas"] = 1;
            return "ok";
        } else {
            return "ko";
        }
        $stmt->close();
        $actualizacion->close();
    }
    
    public function listadoAsignaturasProfesorModel(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM asignatura where IDprofesor IS NULL order by id"); // todas las asignaturas que no tengan profesor

        $stmt->execute();       

        return $stmt->fetchAll();

        $stmt - close();
    }
    
    public function eleccionAsignaturasProfesorModel($datos,$id){
        //var_dump($datos);
        $asignaturas = '';
        for ($i=0; $i<count($datos);$i++){            
                $asignaturas=$asignaturas.$datos[$i].','; 
        }
            
       // echo $asignaturas;
        
        $cadena = substr($asignaturas, 0, -1);
        
        //echo $cadena;
        
            $stmt = Conexion::conectar()->prepare("UPDATE asignatura SET IDprofesor=$id WHERE id in ($cadena)");
        
        if ($stmt->execute()) {
            
            $actualizacion = Conexion::conectar()->prepare('UPDATE usuario set inscritoAsignaturas=1 WHERE id=' . $id); //y actualizamos que ya ha elegido asignaturas
            $actualizacion->execute();
            return "ok";
        } else {
            return "ko";
        }
        $actualizacion->close();

    }
    
    
    
    
    public function cargarAsignaturasModel($id){
        
        
        $stmt = Conexion::conectar()->prepare("SELECT * from asignatura,alumnoasignatura WHERE asignatura.id=alumnoasignatura.idAsignatura AND alumnoasignatura.idAlumno=$id");
        
        
        if($stmt->execute()){
            return $stmt->fetchAll();
        }else{
            return false;
        }
        
        $stmt->close();
        
    }
    
    public function listarAsignaturasProfesor($id){
        $consulta = "SELECT asignatura.id as idAsig, "
                . "asignatura.nombre as nomAsig "
                . "from asignatura,usuario "
                . "WHERE asignatura.IDprofesor=usuario.id "
                . "AND usuario.id=$id";
        $stmt = Conexion::conectar()->prepare($consulta);
        $stmt->execute();       

        return $stmt->fetchAll();

        $stmt - close();
    }
    
    
    public function listarAlumnosAsignaturaModel($idAsignatura){
        
    }
    
    

}

?>