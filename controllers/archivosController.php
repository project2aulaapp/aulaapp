<?php

class ArchivosController {

        public function archivoNuevoController() {
       
            echo '<!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
            Enviar este fichero: <input name="fichero_usuario" type="file" multiple/>   
            <input type="submit" value="Enviar fichero" />';   
            
            if(isset($_FILES["fichero_usuario"])){
                $datosController = $_FILES["fichero_usuario"];

            $respuesta = ArchivosModel::archivoNuevoModel($datosController);


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Archivo cargado correctamente.";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            } 
            }
            
           
        
    }
    
    
}
