<?php

class ArchivosModel extends Datos {

    public function archivoNuevoModel($datosModel, $idAsignatura) {     
        $profesor= $_SESSION["userId"] ;
        
        $profesor = ($_SESSION["userId"] < 10 ) ? '0'.$profesor: $profesor;//esto habrá que cambiarlo a códigos de 3 números
        
        
        if  (move_uploaded_file($datosModel['tmp_name'], 'archivos/' .$profesor.$idAsignatura.$datosModel['name'])) {// de uno en uno, de momento
           return "ok";
        } else {
            return "ko";
        }
    }
    
    public function listarArchivosModel(){
        $directorio =  'archivos';
        $ficheros1  = scandir($directorio);

        return $ficheros1;
        
    }
    
    
    public function listarAsignaturasModel($id){
        $datosAsignatura = Conexion::conectar()->prepare("SELECT * FROM asignatura WHERE IDprofesor =".$id);
        $datosAsignatura->execute();
        
        return $datosAsignatura->fetchAll();
        $datosAsignatura->close();
    }

}
