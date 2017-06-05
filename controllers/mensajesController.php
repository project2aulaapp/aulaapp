<?php

/**
 * 	Controlador de mensajes
 */
class MensajesController extends MvcController {

    public function mensajeNuevoController() {
        if (isset($_POST["remitente"])) {
            $datosController = array("remitente" => $_POST["remitente"],
                "destinatario" => $_POST["destinatario"],
                "asunto" => filter_var ( $_POST["asunto"], FILTER_SANITIZE_STRING),
                "cuerpo" => filter_var ( $_POST["cuerpo"], FILTER_SANITIZE_STRING)
            );

            $respuesta = MensajesModel::mensajeNuevoModel($datosController, "mensaje");

            //var_dump($respuesta);
            if ($respuesta == "ok") {
                //header("location:index.php?action=ok");
                echo "<div class='both correct'>¡Mensaje enviado!</div>";
            } else {
                //header("location:index.php");
                echo "<div class='both incorrect'>Ha debido de ocurrir algún error y el mensaje no se envió</div>";
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
                echo '<div class="both incorrect">No se borró el mensaje, ocurrió algún error.</div>';
            }
        }
    }

    public function listarDestinatariosController() {
        $respuesta = MensajesModel::listarDestinatariosModel();
        echo '<label>Destinatario:</label><select name="destinatario"> '; 
        foreach ($respuesta as $fila => $item) 
            {                   
              echo '<option value="'.$item["id"].'">'.$item["user"].' - '.ucfirst($item["nombre"]).' '.$item["apellido1"].' '.$item["apellido2"].'</option>';       
            }
        echo '</select>';
    }
    
    
    public function verMensajeDetalleController(){
        $respuesta = MensajesModel::verMensajeDetalleModel($_GET["id"]);
        $remitente = MensajesModel::remitenteModel("usuario", $respuesta["IDRemitente"]);
        
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