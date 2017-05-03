<?php

class ArchivosModel extends Datos {

    public function archivoNuevoModel($datosModel, $idAsignatura) {     
        #profesor tiene que ser una cifra de 3 dígitos. Con str_pad rellenamos por la izquierda a ceros (0) hasta completar los 3 dígitos
        #Por ejemplo si el id del profesor es 15, rellenaremos sólo un cero, si es 3, dos ceros a la izquierda y así
        $profesor= str_pad($_SESSION["userId"] , 3, '0', STR_PAD_LEFT);
        
        
        
        
        if  (move_uploaded_file($datosModel['tmp_name'], 'archivos/' .$profesor.$idAsignatura.$datosModel['name'])) {// de uno en uno, de momento
            #si todo va bien, sería un código de 6 números, profesor+asignatura+nombrearchivo.extension
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
