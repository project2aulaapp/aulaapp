<?php

class UsuariosModel extends Datos {
    #registro de usuarios
    #------------------------------------
    
    public function registroUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (user, password, nombre, apellido1, apellido2, email, frase_recuperacion, respuesta_frase_recuperacion) VALUES (:user, :password, :nombre, :apellido1, :apellido2, :email, :frase_recuperacion, :respuesta_frase_recuperacion)");

        $stmt->bindParam(":user", $datosModel["user"], PDO::PARAM_STR);
        $stmt->bindParam(":password", sha1($datosModel["password"]), PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido1", $datosModel["apellido1"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido2", $datosModel["apellido2"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":frase_recuperacion", $datosModel["pregunta"], PDO::PARAM_STR);
        $stmt->bindParam(":respuesta_frase_recuperacion", $datosModel["respuesta"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {
            return "ko";
        }

        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

#Login de usuarios
    #------------------------------------

    public function ingresoUsuarioModel($datosModel, $tabla) {
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE user = :usuario");


        $stmt->bindParam(":usuario", $datosModel["user"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            if ($stmt->fetch()["password"] != sha1($datosModel["password"])) {
                $contador = Conexion::conectar()->prepare("UPDATE usuario SET contador_fallo_login=contador_fallo_login+1 WHERE user='" . $datosModel["user"] . "'"); //si login ko suma 1 al contador
                $contador->execute();
                return;
            } 
                $contador = Conexion::conectar()->prepare("UPDATE usuario SET contador_fallo_login=0 WHERE user='" . $datosModel["user"] . "'"); //si login ok contador a 0
                $contador->execute();
           
           $stmt->execute(); // la ejecuto de nuevo porque me daba error y no entraba al login
           return $stmt->fetch(); 
           $stmt->close(); //cerramos la conexión cuando hemos terminado.
        }
        
        
    }

    #Login de usuarios
    #------------------------------------

    public function vistaUsuariosModel($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT id,user,email FROM $tabla where autorizado=0");


        $stmt->execute();

        return $stmt->fetchAll(); //fetchAll porque obtiene todas las filas de un conjunto de resultados
        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

    public function editarUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = $datosModel");

        $stmt->execute();

        return $stmt->fetch(); //sólo una fila, la del usuario
        $stmt->close();
    }

    public function verPerfilUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = $datosModel");

        $stmt->execute();

        return $stmt->fetch(); //sólo una fila, la del usuario, por eso fetch y no fetchAll()
        $stmt->close();
    }

    #Actualización  de usuarios
    #------------------------------------		

    public function actualizarUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET user=:usuario,email=:email,password=:pass,nombre=:nombre,apellido1=:apellido1,apellido2=:apellido2 WHERE id=:id");

        $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
        $stmt->bindParam(":usuario", $datosModel["user"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", sha1($datosModel["newPass"]), PDO::PARAM_STR);
        $stmt->bindParam(":apellido1", $datosModel["ape1"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido2", $datosModel["ape2"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }


        $stmt->close();
    }

    public function autorizarUsuarioAlumnoModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autorizado=1 , rolID=3 WHERE id=$datosModel");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }

        $stmt->close();
    }
    
    #Función para autorizar a usuarios como administradores rol 1
        public function autorizarUsuarioAdminModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autorizado=1 ,rolID=1 WHERE id=$datosModel");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }

        $stmt->close();
    }
    #Función para añadir a usuarios como profesores rol 2
    public function autorizarUsuarioProfesorModel($datosModel, $tabla) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET autorizado=1 ,rolID=2 WHERE id=$datosModel");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }

        $stmt->close();
    }

    #BORRAR USUARIO
    #-----------------------------------------------

    public function borrarUsuarioModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=$datosModel");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }
        $stmt->close();
    }

    # FUNCIÓN PARA LISTAR TODOS LOS USUARIOS DE LA APLICACIÓN PARA QUE EL ADMINISTRADOR LOS DÉ DE BAJA SI PROCEDE

    public function listarUsuariosModel($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT id,user,email FROM $tabla WHERE id!=1"); //Todos menos el administrador principal


        $stmt->execute();

        return $stmt->fetchAll(); //fetchAll porque obtiene todas las filas de un conjunto de resultados
        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

    # Función para inscribirse a un curso
}

//Fin clase UsuariosModel
?>