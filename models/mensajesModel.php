<?php

class MensajesModel extends Datos {
    #------------------------------------------------------------
    #
		#	mensajes!
    #
		#------------------------------------------------------------

    public function mensajeNuevoModel($datosModel, $tabla) {


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (IDRemitente, asunto, cuerpoMensaje, IDDestinatario) VALUES (:idRemitente, :asunto, :cuerpo,:destinatario)");

        $stmt->bindParam(":idRemitente", $datosModel["remitente"], PDO::PARAM_INT);
        $stmt->bindParam(":destinatario", $datosModel["destinatario"], PDO::PARAM_INT);
        $stmt->bindParam(":asunto", $datosModel["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":cuerpo", $datosModel["cuerpo"], PDO::PARAM_STR);
        //$stmt->execute();
        //var_dump($stmt);

        if ($stmt->execute() && $datosModel["remitente"] === $_SESSION['userId']) {

            /*
              con "$datosModel["remitente"]===$_SESSION['userId']" prevengo
              que alguien no pueda enviar un mensaje manipulando el código html, cambiando el value del formulario aunque esté en hidden el campo remitente...
             */

            return "ok";
        } else {
            return "ko";
        }

        $stmt->close(); //cerramos la conexión cuando hemos terminado.
    }

    public function vistaMensajesModel($tabla) { // función que lo que hace es listar todos los mensajes que tenga un usuario
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where IDDestinatario=" . $_SESSION["userId"]);

        /*
         *  Con la siguiente consulta hacemos que las notificaciones se pongan a 0 pues se supone que el cliente al hacer click en ver mensajes
         *  lo hace para leer todas las notificaciones. 
         *                          */
        $vaciaNotificaciones = Conexion::conectar()->prepare("UPDATE usuario SET notificaciones=0 WHERE id=" . $_SESSION["userId"]);

        $stmt->execute();

        $vaciaNotificaciones->execute();

        return $stmt->fetchAll(); //fetchAll porque obtiene todas las filas de un conjunto de resultados
        $stmt->close(); //cerramos la conexión cuando hemos terminado.
        $vaciaNotificaciones->close();
    }

    public function remitenteModel($tabla, $id) {
        $stmt = Conexion::conectar()->prepare("SELECT nombre,apellido1,apellido2 FROM $tabla WHERE id=$id");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }

//fin función remitenteModel

    public function borrarMensajeModel($datosModel, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

        $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

        //var_dump($stmt);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "ko";
        }
        $stmt->close();
    }

// fin función borrarMensajes

    public function listarDestinatariosModel() {
        $stmt = Conexion::conectar()->prepare("SELECT id, nombre, apellido1, apellido2 FROM usuario");
        
        $stmt->execute();

        return $stmt->fetchAll(); //fetchAll porque obtiene todas las filas de un conjunto de resultados
        $stmt->close();
    }

}

?>