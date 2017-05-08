<?php

class PracticasController extends MvcController {

    public function practicaNuevaController() { //profesor puede subir una nueva práctica
        $listadoAsignaturas = PracticasModel::listarAsignaturasModel($_SESSION["userId"]);

        //var_dump($listadoAsignaturas);
        echo '<!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES  añadir atributo multiple si quiero subir más de un archivo-->
            Enviar este fichero: <input name="fichero_usuario" type="file"/> ';
        echo 'Selecciona la asignatura';
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input>';
        }
        echo '<input type="submit" value="Enviar fichero" />';

        if (isset($_FILES["fichero_usuario"])) {
            $datosController = $_FILES["fichero_usuario"];
            $idAsignatura = $_POST["idAsignatura"];

            $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);
            $respuesta = PracticasModel::practicaNuevaModel($datosController, $asignatura);


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Archivo de práctica cargado correctamente.";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
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
    public function listarPracticasController($idAsignatura, $idAlumno) {
        //echo 'hola';
        $respuesta = PracticasModel::listarPracticasModel();
        //var_dump($respuesta);
        $valor = ' ';
        $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);
        $alumno = str_pad($idAlumno, 3, '0', STR_PAD_LEFT);

        //echo $asignatura.'<br>';

        foreach ($respuesta as $fila => $item) {
            //var_dump($item);
            //echo substr($item,0,3).'  <br>';
            //echo $alumno.'<br>';
            //id de alumno las tres primeras cifras, el id de la asignatura en los otros tres siguientes 
            if ($item != '.' && $item != '..' && $item != '.htaccess' && substr($item, 0, 3) == $alumno) {
                $valor = substr($item, 6);
                $resultado = utf8_encode($valor);
                $direccion = 'practicas/' . utf8_encode($item);
                echo '<div class="contenido-practica">';
                echo "<p><a href='$direccion'>Descargar $resultado </a></p>";
                echo '</div>';
            }
        }
    }

    public function listarPracticasAsigntauraAlumnoController($idAlumno) {//para el profesor
        $respuesta = PracticasModel::listarPracticasModel();
        $listadoAsignaturas = PracticasModel::listarAsignaturasModel($idAlumno);
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input>';
        }
        echo '<input type="submit" value="Enviar fichero" />';

        //var_dump($respuesta);
        $valor = ' ';
        $asignatura = str_pad($idProfesor, 3, '0', STR_PAD_LEFT);

        foreach ($respuesta as $fila => $item) {
            //echo utf8_encode($item);;
            //id de alumno las tres primeras cifras, el id de la asignatura en los otros tres siguientes 
            if ($item != '.' && $item != '..' && $item != '.htaccess' && substr($item, 0, 3) == $asignatura) {
                $valor = substr($item, 6);
                $resultado = utf8_encode($valor);
                $direccion = 'practicas/' . utf8_encode($item);
                echo '<div class="contenido-practica">';
                echo "<p><a href='$direccion'>Descargar $resultado </a></p>";
                echo '</div>';
            }
        }
    }

    public function listarPracticasAsigntauraProfesorController($idProfesor) {
        $respuesta = PracticasModel::listarPracticasModel();
        //var_dump($respuesta);
        $valor = ' ';
        $asignatura = str_pad($idProfesor, 3, '0', STR_PAD_LEFT);

        foreach ($respuesta as $fila => $item) {
            //echo utf8_encode($item);;
            //id de alumno las tres primeras cifras, el id de la asignatura en los otros tres siguientes 
            if ($item != '.' && $item != '..' && $item != '.htaccess' && substr($item, 0, 3) == $asignatura) {
                $valor = substr($item, 6);
                $resultado = utf8_encode($valor);
                $direccion = 'practicas/' . utf8_encode($item);
                echo '<div class="contenido-practica">';
                echo "<p><a href='$direccion'>Descargar $resultado </a></p>";
                echo '</div>';
            }
        }
    }

    public function listarPracticaBorrarController($idProfesor) {//función para que el profesor pueda listar las prácticas suyas y borrar las que quiera pulsando en borrar
        $respuesta = PracticassModel::listarPracticasModel();



        $valor = ' ';
        $profesor = str_pad($idProfesor, 3, '0', STR_PAD_LEFT);

        foreach ($respuesta as $fila => $item) {
            $direccion = ' ';
            if ($item != '.' && $item != '..' && $item != '.htaccess' && (substr($item, 0, 3) == $profesor)) {
                // esto (substr($item, 0, 3) == $profesor) quiere decir que el archivo corresponda con el id del profesor
                $valor = utf8_encode(substr($item, 6));
                $direccion = 'archivos/' . utf8_encode($item);


                echo '<div class="archivo-borrar">';
                echo "<p><a href='index.php?action=borrarArchivos&nbArchivo=$direccion'>Borrar archivo --> <strong>$valor</strong></a></p>";
                //echo $direccion;
                echo '</div>';
            }
        }
    }

    public function borrarPracticaController() { //cuando hacemos clic en el botón borrar, ejecutamos esta función 
        if (isset($_GET["nbArchivo"])) {

            $datosController = $_GET["nbArchivo"];
            $respuesta = PracticasModel::borrarPracticaModel($datosController);
            if ($respuesta == "ok") {
                header("location:index.php?action=borrarPractica");
            }
        }
    }

    public function subirPracticaAlumnoController() { //función con la que el alumno subirás sus prácticas, se guardará su id de alumno
        //las tres primeras cifras, el id de la asignatura en los otros tres siguientes y la fecha/hora en las 10 cifras siguientes (hora del servidor)y el nombre del archivo
        $listadoAsignaturas = PracticasModel::listarAsignaturasAlumnoModel($_SESSION["userId"]);

        //var_dump($listadoAsignaturas);
        echo '<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            Enviar este fichero: <input name="fichero_usuario" type="file"/> ';
        echo 'Selecciona la asignatura';
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input>';
        }
        echo '<input type="submit" value="Enviar fichero" />';

        if (isset($_FILES["fichero_usuario"])) {
            $datosController = $_FILES["fichero_usuario"];
            $idAsignatura = $_POST["idAsignatura"];

            $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);


            $respuesta = PracticasModel::subirPracticaAlumnoModel($datosController, $asignatura);


            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Tu práctica ha sido entregada correctamente.";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }
        }
    }

    public function listarAsignaturasController() {
        $listadoAsignaturas = PracticasModel::listarAsignaturasModel($_SESSION["userId"]);
        foreach ($listadoAsignaturas as $fila => $item) {
            $id = $item["id"];
            echo "<p><a href='index.php?action=practicasAlumnos&id=$id'>Elegir asignatura --> <strong>'" . $item["nombre"] . "'</strong></a></p>";
        }

        //var_dump($listadoAsignaturas);
    }


      public function listarPracticasAlumnoController(){
      $listadoAsignaturas = PracticasModel::listarAlumnosPracticasModel($_SESSION["userId"]);
      var_dump($listadoAsignaturas);

      }
     

    public function listarPracticasDeAlumnosController() {//funcion en la que el profesor podrá listar las prácticas según el alumno, para descargarlas y evaluarlas
        if (isset($_GET["id"])) {
            //echo '<script> alert("'.$_GET["id"].'");</script>';
            $idAsignatura = $_GET["id"];
            $alumnos = PracticasModel::listarAlumnosAsignaturaModel($_SESSION["userId"], $idAsignatura);

            foreach ($alumnos as $fila => $item) {
                echo '<a href="index.php?action=descargarPracticasAlumnos&idUsuario=' . $item["uid"] . '&idAsignatura=' . $item["aid"] . '"><button>' . $item["unom"] . ' ' . $item["uape1"] . ' ' . $item["uape2"] . '</button></a>';
            }
        }
    }
    
    
    public function seleccionarAsignaturaController($idAlumno){
        $consulta = "select asignatura.nombre as nomasig,asignatura.id as idasig "
                . "from asignatura,alumnoasignatura,usuario "
                . "where asignatura.id=alumnoasignatura.idAsignatura "
                . "AND alumnoasignatura.idAlumno=usuario.id "
                . "and usuario.id=46";
        $asignaturas = Datos::conectar()->prepare($consulta);
        $asignaturas->execute();
        $asignaturas->fetchAll();
        var_dump($asignaturas);
    }

}
