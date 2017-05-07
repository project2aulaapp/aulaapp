<?php

/*
 * Cada vez que se hace un modelo y un controlador, hay que añadirlo aquí para 
 * que funcione. 
 * 
 *  
 */


require_once "models/enlaces.php";
require_once "controllers/controller.php";
require_once "controllers/usuariosController.php";
require_once "controllers/mensajesController.php";
require_once "controllers/asignaturasController.php";
require_once "models/crud.php";
require_once "models/usuariosModel.php";
require_once "models/asignaturaModel.php";
require_once "models/mensajesModel.php";
require_once "models/cursosModel.php";
require_once "controllers/cursosController.php";
require_once 'controllers/archivosController.php';
require_once 'models/archivosModel.php';
require_once 'controllers/practicasController.php';
require_once 'models/practicasModel.php';


$mvc = new MvcController();
$mvc -> pagina();

?>
