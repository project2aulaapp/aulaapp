<?php

class ArchivosModel {

    public function archivoNuevoModel($datosModel) {     
       
        if  (move_uploaded_file($datosModel['tmp_name'], 'archivos/' .$_SESSION["userId"]. $datosModel['name'])) {
           return "ok";
        } else {
            return "ko";
        }
    }
    
    public function listarArchivosModel($id){
        
        
        
        $directorio =  'archivos';
        $ficheros1  = scandir($directorio);

        return $ficheros1;
        
    }

}
