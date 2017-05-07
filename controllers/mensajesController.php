<?php

/**
 * 	Controlador de mensajes
 */
class MensajesController extends MvcController {

    public function mensajeNuevoController() {
        if (isset($_POST["remitente"])) {
            $datosController = array("remitente" => $_POST["remitente"],
                "destinatario" => $_POST["destinatario"],
                "asunto" => $_POST["asunto"],
                "cuerpo" => $_POST["cuerpo"]
            );

            $respuesta = MensajesModel::mensajeNuevoModel($datosController, "mensaje");

            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "Mensaje enviado!";
            } else {
                //header("location:index.php");
                echo "maaaaaaal!";
            }
        }
    }

    public function vistaMensajesController() { // esta función muestra los mensajes que recibe un usuario
        $respuesta = MensajesModel::vistaMensajesModel("mensaje");


        foreach ($respuesta as $fila => $item) {
            $remitente = MensajesModel::remitenteModel("usuario", $item["IDRemitente"]);
            echo'<tr>
				<td>' . $remitente["nombre"] . ' ' . $remitente["apellido1"] . ' ' . $remitente["apellido2"] . '</td>
				<td>' . $item["asunto"] . '</td>
				<td>' . substr($item["cuerpoMensaje"],0,25) . '</td>
                                <td>' . $item["fecha_envio"] . '</td>
				<td><a href="index.php?action=verMensajes&idBorrar=' . $item["id"] . '"><button>Borrar</button></a></td>
                                <td><a href="index.php?action=verDetalle&id=' . $item["id"] . '"><button>Ver en detalle</button></a></td>
			</tr>';
        }
    }

    public function borrarMensajeController() { //borrar mensajes, obviamente. Está en singular, porque borra de uno en uno
        if (isset($_GET["idBorrar"])) { //se ha pulsado el botón de borrar?
            $datosController = $_GET["idBorrar"];
            $respuesta = MensajesModel::borrarMensajeModel($datosController, "mensaje");
            if ($respuesta == "ok") {
                header("location:index.php?action=verMensajes");
            } else {
                echo 'no se borró el mensaje, ocurrió algún error';
            }
        }
    }

    public function listarDestinatariosController() {
        $respuesta = MensajesModel::listarDestinatariosModel();
        echo 'Destinatario: <select name="destinatario">'; 
        foreach ($respuesta as $fila => $item) 
            {                   
              echo '<option value="'.$item["id"].'">'.$item["user"].' - '.ucfirst($item["nombre"]).' '.$item["apellido1"].' '.$item["apellido2"].'</option>';       
            }
        echo '</select>';
    }
    
    
    public function verMensajeDetalleController(){
        $respuesta = MensajesModel::verMensajeDetalleModel($_GET["id"]);
        $remitente = MensajesModel::remitenteModel("usuario", $respuesta["IDRemitente"]);
        /*
         * var_dump($respuesta);
         * echo '<br>';
         * var_dump($remitente);
         * 
         */
        echo'<div id="mensajeEnDetalle">';
            echo '<h1>Asunto: '.$respuesta["asunto"].'</h1>';
            echo '<p>Fecha y hora de envío: '.$respuesta["fecha_envio"].'</p>';
            echo '<p>Mensaje: '.
                    $respuesta["cuerpoMensaje"]                    
                .' </p>';
            echo '<a href="index.php?action=verMensajes&idBorrar=' . $respuesta["id"] . '"><button>Borrar mensaje</button></a>';
            echo '<a href="index.php?action=verMensajes"><button>Volver a los mensajes</button></a>';        
        
        
        
        echo '</div>';
    }
    
}