<?php


class UsuariosController extends MvcController{
	#REGISTRO DE USUARIOS registro.php
	#-------------------------------------

	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
			$datosController = array("user"=>$_POST["usuarioRegistro"],
						"password"=>$_POST["passwordRegistro"],
						"nombre"=>$_POST["nombreRegistro"],
						"apellido1"=>$_POST["apellido1Registro"],
						"apellido2"=>$_POST["apellido2Registro"],
						"email"=>$_POST["emailRegistro"],
						"pregunta"=>$_POST["preguntaRegistro"],
						"respuesta"=>$_POST["respuestaRegistro"]
						);

		$respuesta = UsuariosModel::registroUsuarioModel($datosController,"usuario");

		if ($respuesta=="ok") {
			header("location:index.php?action=ok");
		}else{
			header("location:index.php");
		}

		}
	}

	#Registro de usuarios ingresar.php
		#------------------------------------

	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIngreso"])){
			$datosController = array("user"=>$_POST["usuarioIngreso"],
									 "password"=>$_POST["passwordIngreso"]);

		$respuesta = UsuariosModel::ingresoUsuarioModel($datosController,"usuario");
			
		//var_dump($respuesta);

				
		if ($respuesta["user"] 	== $_POST["usuarioIngreso"] && 
			$respuesta["password"] 	== sha1($_POST["passwordIngreso"])) {

			//para que iniciemos sesion y continuemos logueados
			session_start();

			$_SESSION["validar"] = true;
			$_SESSION["userId"] =  $respuesta["id"];
			$_SESSION["rol"] = $respuesta["rolID"];
                        $_SESSION["usuario"] = $respuesta["user"];
                        $_SESSION["notificaciones"] = $respuesta["notificaciones"];
                        
			header("location:index.php?action=usuarios");
		}else{
			header("location:index.php?action=fallo");
		}


		}
	}

		#Listar usuarios usuarios.php
		#------------------------------------
	public function vistaUsuariosController(){

		$respuesta = UsuariosModel::vistaUsuariosModel("usuario");

		foreach ($respuesta as $fila => $item) {
			echo'<tr>
				<td>'.$item["user"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=usuarios&idAutorizar='.$item["id"].'"><button>Autorizar usuario</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}		
	}

		#Editar usuario editar.php
		#------------------------------------
	public function editarUsuarioController(){

		$datosController = $_GET["id"];

		//echo $datos;

		$respuesta = UsuariosModel::editarUsuarioModel($datosController,"usuario");

		echo '
		<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

		<input type="text" value="'.$respuesta["user"].'" name="usuarioEditar" required>

		<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

		<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

		<input type="submit" value="Actualizar">';
	}


	#Actualizar usuario editar.php
		#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){
			$datosController = array(
							"id"=>$_POST["idEditar"],
							"user"=>$_POST["usuarioEditar"],
							"email"=>$_POST["emailEditar"]
						  );//para enviarle al modelo para modificar

			$respuesta = UsuariosModel::actualizarUsuarioModel($datosController,"usuario");

			if($respuesta == "ok"){
				header("location:index.php?action=cambio");
			}else{
				echo "error, no se actualizó";
			}

		}
	}
        
        public function autorizarUsuarioController(){

		if(isset($_GET["idAutorizar"])){
			$datosController = $_GET["idAutorizar"];//para enviarle al modelo para modificar

                        
                        
			$respuesta = UsuariosModel::autorizarUsuarioModel($datosController,"usuario");

			if($respuesta == "ok"){
				header("location:index.php?action=usuarios");                                
			}else{
				echo "error, no se pudo autorizar el usuario :( ";
			}

		}
	}
		#Borrar usuario en el archivo  editar.php
		#------------------------------------

	public function borrarUsuarioController(){
		if(isset($_GET["idBorrar"])){
			
			$datosController = $_GET["idBorrar"];
			$respuesta = UsuariosModel::borrarUsuarioModel($datosController,"usuario");
			if ($respuesta == "ok") {
				header("location:index.php?action=usuarios");
			}
		}
	}
        
        	public function listarUsuariosController(){ // con esta función listaremos TODOS los usuarios de la aplicación

		$respuesta = UsuariosModel::listarUsuariosModel("usuario");

		foreach ($respuesta as $fila => $item) {
			echo'<tr>
				<td>'.$item["user"].'</td>
				<td>'.$item["email"].'</td>				
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}		
	}
        
        
        

}


?>