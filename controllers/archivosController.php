<?php

class ArchivosController extends MvcController {

        public function archivoNuevoController() {
            $listadoAsignaturas = ArchivosModel::listarAsignaturasModel($_SESSION["userId"]);
            
            //var_dump($listadoAsignaturas);
            echo '<!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES  añadir atributo multiple si quiero subir más de un archivo-->
            Enviar este fichero: <input name="fichero_usuario" type="file"/> ';
            echo 'Selecciona la asignatura';
            foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="'.$item["id"].'">'.$item["nombre"].'</input>';
            }
            echo '<input type="submit" value="Enviar fichero" />';   
            
            if(isset($_FILES["fichero_usuario"])){
                $datosController = $_FILES["fichero_usuario"];
                $idAsignatura= $_POST["idAsignatura"];
            $asignatura = ($idAsignatura < 10 ) ? '0'.$idAsignatura : $idAsignatura;
            $respuesta = ArchivosModel::archivoNuevoModel($datosController, $asignatura);


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
    
    
    public function listarArchivosController($idAsignatura){
        
       $respuesta = ArchivosModel::listarArchivosModel();
        
       $valor =' ';
       $asignatura = ($idAsignatura < 10 ) ? '0'.$idAsignatura : $idAsignatura;
       
       echo $asignatura.'<br>';
       
        foreach ($respuesta as $fila => $item) {
            
            if($item!='.' && $item!='..' && (substr($item, 2, 2)==$asignatura)){// (substr($item, 0, 2)==$asignatura) si los 2 número de caracteres desde el principio(0) coinciden con la asignatura, se muestran
                $valor = utf8_encode(substr($item, 4));
                $direccion ='archivos/'.utf8_encode($item);
                echo '<div class="contenido-asignatura">';
                echo "<p><a href='$direccion'>Descargar $valor</a></p>";                
                echo '</div>';
                }
            }
       
       
       
       
        
    }
    
    
}
