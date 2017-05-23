<?php

class PracticasModel extends Datos 
{
    
    //Función para subir una nueva práctica
public function practicaNuevaModel($datosModel, $idAsignatura) {
        #profesor tiene que ser una cifra de 3 dígitos. Con str_pad rellenamos por la izquierda a ceros (0) hasta completar los 3 dígitos
        #Por ejemplo si el id del profesor es 15, rellenaremos sólo un cero, si es 3, dos ceros a la izquierda y así
        $profesor = str_pad($_SESSION["userId"], 3, '0', STR_PAD_LEFT);

        if (move_uploaded_file($datosModel['tmp_name'], 'practicas/' . $profesor . $idAsignatura . utf8_decode($datosModel['name']))) {// archivos de uno en uno
            #si todo va bien, sería un código de 6 números, profesor+asignatura+nombrearchivo.extension
            return "ok";
        } else {
            return "ko";
        }
    }
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    //Función para que el profesor pueda listar y descargar las prácticas 
    //que los alumnos han realizado y entregado
    public function listarPracticasAlumnoModel(){
        $directorio = 'practicas/entregaPracticas/';
        $practicas = scandir($directorio);
        return $practicas;
    }
   
    
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    
    
    
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    
    
    
    
    
    
    
    /* ----------------------------------   Funciones auxiliares    ----------------------------------------------------------------------------- */
    
    /*   Esta función lo que me hace es listar las asignaturas que imparte un determinado profesor,
     *   al ser llamada, se le pasa el id del profesor para realizar la consulta y que devuelva un listado de sus asignaturas   */
    public function listarAsignaturasModel($id) { //para que el profesor pueda elegir a qué asignatura subir las prácticas
        $datosAsignatura = Conexion::conectar()->prepare("SELECT * FROM asignatura WHERE IDprofesor =" . $id);
        $datosAsignatura->execute();

        return $datosAsignatura->fetchAll();
        $datosAsignatura->close();
    }
    
    /*  Función para listar las asignaturas que imparte un profesor, recibe como parámetro el id del profesor*/
    public function listarAsignaturasProfesorModel($idProfesor){
        $consulta = "SELECT id,nombre from asignatura where IDprofesor=$idProfesor";
        $asignaturas = Datos::conectar()->prepare($consulta);
        $asignaturas->execute();
        $asignaturas_array = $asignaturas->fetchAll();
        return($asignaturas_array);
        $asignaturas->close();
    }
    
    /*  Función para listar las asignaturas que recibe un alumno, recibe como parámetro el id del alumno*/
    public function listarAsignaturasAlumnoModel($idAlumno){
        $consulta = "select asignatura.nombre as nombre, asignatura.id as id "
                . "from asignatura,alumnoasignatura,usuario "
                . "WHERE asignatura.id=alumnoasignatura.idAsignatura "
                . "and usuario.id=alumnoasignatura.idAlumno "
                . "AND usuario.id=$idAlumno";
        $asignaturas = Datos::conectar()->prepare($consulta);
        $asignaturas->execute();
        $asignaturas_array = $asignaturas->fetchAll();
        return($asignaturas_array);
        $asignaturas->close();
    }
    
    /*  -------------------------------------------------------------------------------------------------------------------------------------------     */
    // Función para que el alumno pueda subir sus prácticas ya terminadas, deberá elegir a qué asignatura subir ese archivo para que luego el profesor
    // pueda descargarlas y revisarlas.
    
public function entregarPracticaModel($datosModel, $idAsignatura) {
        #alumno tiene que ser una cifra de 3 dígitos. Con str_pad rellenamos por la izquierda a ceros (0) hasta completar los 3 dígitos
        #Por ejemplo si el id del profesor es 15, rellenaremos sólo un cero, si es 3, dos ceros a la izquierda y así
        $alumno = str_pad($_SESSION["userId"], 3, '0', STR_PAD_LEFT);
        $asignatura = str_pad($idAsignatura, 3, '0', STR_PAD_LEFT);
        if (move_uploaded_file($datosModel['tmp_name'], 'practicas/entregaPracticas/' . $alumno . $asignatura . time() . utf8_decode($datosModel['name']))) {// archivos de uno en uno
            #si todo va bien, sería un código de 6 números, profesor+asignatura+nombrearchivo.extension
            return "ok";
        } else {
            return "ko";
        }
    }
    
    
     //Función para listar las prácticas que haya en la carpeta prácticas las lista todas y luego ya se filtra en el controlador
       public function listarPracticasModel() {
        $directorio = 'practicas';
        $practicas = scandir($directorio);
        return $practicas;
    }
    
    
    
    
    
   
}//fin clase PracticasModel
