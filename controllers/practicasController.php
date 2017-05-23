<?php

class PracticasController extends MvcController {

    
    /*   Función que se invoca para agregar un archivo de práctica a una determinada asignatura   */
    public function practicaNuevaController() {
        $listadoAsignaturas = PracticasModel::listarAsignaturasModel($_SESSION["userId"]);


        echo 'Enviar esta práctica: <input name="fichero_usuario" type="file"/> ';
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

            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Archivo de práctica cargado correctamente.";
            } else {
                echo "maaaaaaal!";
            }
        }
    }//Fin función practicaNuevaController
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    /*  Función para ver el listado de las prácticas que ha subido el profesor, si la vista es profesor, desde ahí se le permitirá borrar esos archivos */
    public function listarPracticasProfesorController($idProfe) {
        $listadoAsignaturas = PracticasModel::listarAsignaturasProfesorModel($idProfe);
        if(!isset($_POST["idAsignatura"])){
        echo 'Selecciona la asignatura de las que quires ver las prácticas';
        echo '<form method="POST">';
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input>';
        }
        echo '<input type="submit" value="Seleccionar" />';
        echo '</form>';
        }
        if(isset($_POST["idAsignatura"])){
        if($_POST["idAsignatura"]!=null){
            $respuesta = PracticasModel::listarPracticasModel();
        $valor = ' ';
        $asignatura = str_pad($_POST["idAsignatura"], 3, '0', STR_PAD_LEFT);
        $profesor = str_pad($_SESSION["userId"], 3, '0', STR_PAD_LEFT);        

        foreach ($respuesta as $fila => $item) {
            
            // como me vienen todas las prácticas de la carpeta, las filtro para mostrarlas
            if ($item != '.' && $item != '..' && $item != '.htaccess' && substr($item, 3, 3) == $asignatura && substr($item, 0, 3)== $profesor) {
                $valor = substr($item, 6);
                $resultado = utf8_encode($valor);
                $direccion = 'practicas/' . $item;
                $practica = utf8_encode($item);
                echo '<div class="contenido-practica">';
                echo "<p><a href='$direccion'>Descargar--> $resultado </a> <a style='color:red' href='index.php?action=borrarPractica&nbPractica=$practica'>Borrar práctica</a></p>";
               
            }
        }
        echo '<p><a href="index.php?action=practicas">Volver</a></p></div>';
        }    
          
        }
        
    }

    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    /*  Función para borrar prácticas, esta función la usan los profesores*/
        public function borrarPracticaController($nombrePractica) { //cuando hacemos clic en el botón borrar, ejecutamos esta función 
        if (unlink('practicas/'.$nombrePractica)) {
            header("location:index.php?action=practicas");           
        } else {
            echo 'Ocurrió algún error';
        }
       
    }
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    // Función para listar las prácticas que ha subido el profesor, esto lo verá el alumno
    public function listarPracticasAlumnoController($idAlum) {
        $listadoAsignaturas = PracticasModel::listarAsignaturasAlumnoModel($idAlum);
        if(!isset($_POST["idAsignatura"])){
            echo 'Selecciona la asignatura de las que quires ver las prácticas';
        echo '<form method="POST">';
        foreach ($listadoAsignaturas as $fila => $item) {
            echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '" checked>' . $item["nombre"] . '</input>';
        }
        echo '<input type="submit" value="Seleccionar" />';
        echo '</form>';
        }
        
        if(isset($_POST["idAsignatura"])){
        if($_POST["idAsignatura"]!=null){
            $respuesta = PracticasModel::listarPracticasModel();
        $valor = ' ';
        $asignatura = str_pad($_POST["idAsignatura"], 3, '0', STR_PAD_LEFT);
                

        foreach ($respuesta as $fila => $item) {
            
            // como me vienen todas las prácticas de la carpeta, las filtro para mostrarlas
            if ($item != '.' && $item != '..' && $item != '.htaccess' && substr($item, 3, 3) == $asignatura) {
                $valor = substr($item, 6);
                $resultado = utf8_encode($valor);
                $direccion = 'practicas/' . utf8_encode($item);
                $practica = utf8_encode($item);
                echo '<div class="contenido-practica">';
                echo "<p><a href='$direccion'>Descargar--> $resultado </a></p>";
                
               
            }
        }
        echo '<p><a href="index.php?action=practicas">Volver</a></p></div>';
        }    
          
        }
        
    }
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    // Función para que el alumno pueda subir sus prácticas ya terminadas, deberá elegir a qué asignatura subir ese archivo para que luego el profesor
    // pueda descargarlas y revisarlas.
    public function entregarPracticaController($userId) {

        $asignaturasAlumno = PracticasModel::listarAsignaturasAlumnoModel($_SESSION["userId"]);
        if (!isset($_POST["idAsignatura"])) {
            echo '<p>Elige la asignatura en la que quieras entregar prácticas</p>';
            echo '<form method="POST">';
            foreach ($asignaturasAlumno as $fila => $item) {
                echo '<input type="radio" name="idAsignatura" value="' . $item["id"] . '">' . $item["nombre"] . '</input>';
            }
            echo '<input type="submit" value="Seleccionar" />';
            echo '</form>';
            
        } else {
            
            if (!isset($_FILES['practica'])) {
                if(isset($_POST["idAsignatura"])){
                    $_SESSION["idAsig"] = $_POST["idAsignatura"];
                    echo 'Enviar esta práctica: <form method="POST"><input name="practica" type="file"/> ';                    
                    echo '<input type="submit" value="Enviar Practica" /></form>';
                }
                
            }
        }       
        
        if (isset($_FILES['practica'])) {
            $datosController = $_FILES["practica"];            
            
            $respuesta = PracticasModel::entregarPracticaModel($datosController, $_SESSION["idAsig"]);
            // var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "<div class='correct'>Archivo de práctica cargado correctamente.</div>";
                
            } else {
                echo "<div class='incorrect'>El archivo no ha podido cargarse, comprueba que hiciste todo bien!</div>";
            }
        }

    }

    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    public function listarPracticasEntregadasController() {
        $respuesta = PracticasModel::listarPracticasAlumnoModel();
        $idAlumno = 032;
        $idAsignatura = 001;
        foreach ($respuesta as $fila) {
            $alumno = substr($fila, 0,3);
            $asignatura = substr($fila, 3,3);
            $fecha = substr($fila, 6,10);
            $valor = substr($fila, 16);
            if($fila!='.' 
                    && $fila!='..' 
                    && $fila!='.htaccess' 
                    && $alumno = $idAlumno
                    && $asignatura = $idAsignatura){
                $practica = utf8_encode($fila);
               echo "<a href='practicas/entregaPracticas/$practica'>".utf8_encode($valor).'</a><strong> entregado en fecha: '. date('d-m-y h:m:s', $fecha).' </strong>'; 
            }
            
            
        }
       
        
        
        
        
        
        //var_dump($respuesta);
    }
           
    
    
    
    
    
    
    
    
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
}//Fin clase PracticasController


