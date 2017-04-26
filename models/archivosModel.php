<?php

class ArchivosModel extends Datos {

    public function archivoNuevoModel($datosModel) {

        //$dir_subida = 'archivos/'; //esto habrá que cambiarlo al directorio del servidor
        //$fichero_subido = $dir_subida . basename($datosModel['name']);

        //var_dump($datosModel["fichero"]);
       
        if  (move_uploaded_file($datosModel['tmp_name'], 'archivos/' .$_SESSION["userId"]. $datosModel['name'])) {
           return "ok";
        } else {
            return "ko";
        }

        
        

        
    }

}
