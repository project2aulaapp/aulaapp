<?php

class ArchivosController extends MvcController {

    /**
     * función para que el profesor suba archivos al servidor, que se alojarán en la carpeta /archivos de la raíz de la aplicación
     *
     * @return no retorna nada
     * @param no hay parámetros que pasar
     */
    public function archivoNuevoController() {
        $listadoAsignaturas = ArchivosModel::listarAsignaturasModel($_SESSION["userId"]);

        //var_dump($listadoAsignaturas);
        echo 'Enviar este fichero: <input name="fichero_usuario" type="file"/> ';
        echo 'Selecciona la asignatura';
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<label><input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input></label>';
        }
        echo '<input type="submit" value="Enviar fichero" />';

        if (isset($_FILES["fichero_usuario"])) {
            $datosController = $_FILES["fichero_usuario"];
            $idAsignatura = $_POST["idAsignatura"];

            $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);
            $respuesta = ArchivosModel::archivoNuevoModel($datosController, $asignatura);

            if ($respuesta == "ok") {
                echo '<div class="correct">Archivo cargado correctamente.</div>';
            } else {
                 echo '<div class="incorrect">Debido a algún error el archivo no se cargó, vuelva a intentarlo.</div>';
                
            }
        }
    }

    #Lista los archivos que haya subido el profesor de esa asignatura, que se pasa como parámetro en la llamada a la función 

    /**
     * Lista los archivos que haya subido el profesor de esa asignatura, que se pasa como parámetro en la llamada a la función
     *
     * @return no retorna nada
     * @param int $idAsignatura id de la asignatura de los apuntes
     */
    public function listarArchivosController($idAsignatura) {

        $respuesta = ArchivosModel::listarArchivosModel();

        $valor = ' ';
        $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);
        
        foreach ($respuesta as $fila => $item) {

            if ($item != '.' && $item != '..' && (substr($item, 3, 3) == $asignatura)) {// (substr($item, 0, 2)==$asignatura) si los 2 número de caracteres desde el principio(0) coinciden con la asignatura, se muestran
                $valor = utf8_encode(substr($item, 6));
                $direccion = 'archivos/' . utf8_encode($item);
                
                echo "<p><a class='boton' href='$direccion'>Descargar $valor</a></p>";
                
            }
        }
    }

    public function listarArchivoBorrarController($idProfesor) {
        $respuesta = ArchivosModel::listarArchivosModel();

        $valor = ' ';
        $profesor = str_pad($idProfesor, 3, '0', STR_PAD_LEFT);
       
        foreach ($respuesta as $fila => $item) {
            $direccion = ' ';
            if ($item != '.' && $item != '..' && $item != '.htaccess' && (substr($item, 0, 3) == $profesor)) {// (substr($item, 0, 2)==$asignatura) si los 2 número de caracteres desde el principio(0) coinciden con la asignatura, se muestran
                $valor = utf8_encode(substr($item, 6));
                $direccion = 'archivos/' . utf8_encode($item);


                
                echo "<a href='index.php?action=borrarArchivos&nbArchivo=$direccion' class='boton'>Borrar archivo --> <strong>$valor</strong></a>";
                //echo $direccion;
                
            }
        }
    }

    public function borrarArchivoController() {
        if (isset($_GET["nbArchivo"])) {

            $datosController = $_GET["nbArchivo"];
            $respuesta = ArchivosModel::borrarArchivoModel($datosController);
            if ($respuesta == "ok") {
                header("location:index.php?action=borrarArchivos");
            }
        }
    }

}
