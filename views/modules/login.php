<section id="login">
<h1>LOGIN</h1>

    <form method="post" id="myForm">
        <p>
            <input type="text" name="usuarioIngreso" id="userName" placeholder="Nombre de usuario" title="nombre de usuario" autofocus>
            <span></span>
        </p>
        <p>
            <input type="password" name="passwordIngreso" id="password" placeholder="Contraseña" title="contraseña">
            <span></span>
        </p>
        <p>
            <button type="submit" value="Enviar">ENVIAR</button>
            <button type="reset" value="Limpiar">LIMPIAR</button>
        </p>
    </form>
    <script type="text/javascript" src="src/javascript/validacionLogin/validacionSubmit.js"></script>
    <script type="text/javascript" src="src/javascript/validacionLogin/validacionBlur.js"></script>

	<a href="index.php?action=registro">Aun no estoy registrado.</a>

	<?php

		$ingreso = new UsuariosController();
		$ingreso -> ingresoUsuarioController();

		if(isset($_GET["action"])){
			if ($_GET["action"] == "fallo") {
				echo "<div class='both incorrect'>Fallo al hacer login.</div>";                                
			}
		}

	?>
</section>