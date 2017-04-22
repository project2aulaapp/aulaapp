<?php

class CursosModel extends Datos {
    #------------------------------------------------------------
    #
    #	cursos!
    #
    #------------------------------------------------------------

    public function cursoNuevoModel($datosModel, $tabla) {


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCurso) VALUES (:nbCurso)");

        $stmt->bindParam(":nbCurso", $datosModel["curso"], PDO::PARAM_STR);
		

        //var_dump($stmt);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }

        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

    public function listarCursosModel($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT idCurso, nombreCurso FROM $tabla");
		

        $stmt->execute();

        return $stmt->fetchAll(); //fetchAll porque obtiene todas las filas de un conjunto de resultados
        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

    public function borrarCursoModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCurso=:id");

        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }
        $stmt->close();
    }

  

}

?>