

<?php

class PracticasModel extends Datos {

    public function practicaNuevaModel($datosModel, $idAsignatura) {
        #profesor tiene que ser una cifra de 3 dígitos. Con str_pad rellenamos por la izquierda a ceros (0) hasta completar los 3 dígitos
        #Por ejemplo si el id del profesor es 15, rellenaremos sólo un cero, si es 3, dos ceros a la izquierda y así
        $profesor = str_pad($_SESSION["userId"], 3, '0', STR_PAD_LEFT);

        if (move_uploaded_file($datosModel['tmp_name'], 'practicas/' . $profesor . $idAsignatura . utf8_decode($datosModel['name']))) {// de uno en uno, de momento
            #si todo va bien, sería un código de 6 números, profesor+asignatura+nombrearchivo.extension
            return "ok";
        } else {
            return "ko";
        }
    }

    public function listarPracticasModel() {
        $directorio = 'practicas';
        $practicas = scandir($directorio);
        //var_dump($practicas);
        return $practicas;
    }

    public function listarAsignaturasModel($id) { //para que el profesor pueda elegir a qué asignatura subir las prácticas
        $datosAsignatura = Conexion::conectar()->prepare("SELECT * FROM asignatura WHERE IDprofesor =" . $id);
        $datosAsignatura->execute();

        return $datosAsignatura->fetchAll();
        $datosAsignatura->close();
    }

    public function borrarPracticaModel($practica) {
        //var_dump($practica);


        if (unlink($practica)) {// de uno en uno, de momento
            #si todo va bien, sería un código de 6 números, profesor+asignatura+nombrepractica.extension
            return "ok";
        } else {
            return "ko";
        }
    }

}
