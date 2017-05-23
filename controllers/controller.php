<?php

class MvcController{

	#	CONTROLADOR PRINCIPAL, de él heredarán el resto de controladores

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		/*
		* 	Esta función lo que hace es que recibe por get el action y te
		*	envía a la página que corresponda, si está en la lista blanca
		*	que está en enlaces.php Para añadir nuevos enlaces hay que poner
		*	en ese archivo un else if más, incluyendo la nueva página ejemplo:
		*	else if($enlaces == "ok"){
		*
		*	$module =  "views/modules/registro.php";
		*
		*	}
		*
		*	Con esto ocultamos que estamos usando el patrón MVC ante posibles 
		*	atacantes :)
		*	
		*	Es decir, si yo quisiera hacer un enlace, que fuera a un 
		*	procesador de formularios valida.php, haría un 
		*	else if($enlaces == validar){ $module = "views/modules/loquecorresponda.php";}
		*/

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
}//fin de la clase MvcController

?>