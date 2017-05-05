<?php


if (!$_SESSION["validar"]) {
	header("location:index.php?action=login");
	exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

if(($_SESSION["rol"] == 1) || ($_SESSION["rol"] == 2) ){ 

}else{//si no es profesor (rol 2) o administrador (rol 1) lo lleva fuera
    header("location:index.php?action=index");
}

?>


<h1>USUARIOS POR AUTORIZAR</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Nombre de usuario</th>				
				<th>Nombre y apellidos</th>
                                <th>Autorizar</th>
				<th>Borrar Usuario</th>

			</tr>

		</thead>

		<tbody>
			<?php

				$vistaUsuario = new UsuariosController();
				$vistaUsuario -> vistaUsuariosController();
                                $vistaUsuario -> autorizarUsuarioAlumnoController();
                                $vistaUsuario -> autorizarUsuarioProfesorController();
                                $vistaUsuario -> autorizarUsuarioAdminController();
				$vistaUsuario -> borrarUsuarioController();                                
			?>
			

		</tbody>
	</table>

	<?php
	if (isset($_GET["action"])){
		if ($_GET["action"] == "cambio") {
			echo "Cambio correcto.";
		}
	}



?>


