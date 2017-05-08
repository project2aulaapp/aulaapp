<section id="registroUsuario">
<h1>REGISTRO DE USUARIO</h1>

    <form method="post" id="myForm">
        <p>
            <input type="text" name="usuarioRegistro" id="userName" placeholder="Nombre de usuario" title="nombre de usuario">
            <span></span>
        </p>
        <p>
            <input type="password" name="passwordRegistro" id="password" placeholder="Contraseña" title="contraseña">
            <span></span>
        </p>
        
        <p>
            <input type="password" name="rePasswordRegistro" id="rePassword" placeholder="Repite contraseña" title="contraseña">
            <span></span>
        </p>        
        
        <p>
            <input type="text" name="nombreRegistro" id="userNameReal" placeholder="Nombre" title="nombre">
            <span></span>
        </p>
        <p>
            <input type="text" name="apellido1Registro" id="firstSurname" placeholder="Primer apellido" title="primer apellido">
            <span></span>
        </p>
        <p>
            <input type="text" name="apellido2Registro" id="secondSurname" placeholder="Segundo apellido" title="segundo apellido">
            <span></span>
        </p>
        <p>
            <input type="text" name="emailRegistro" id="mail" placeholder="Correo electronico" title="e-mail">
            <span></span>
        </p>
        <p>
            <select name="preguntaRegistro" id="questions" title="pregunta">
                <option value="" selected hidden>Selecciona una pregunta</option>
                <option value="1">¿Nombre de tu mascota?</option>
                <option value="2">¿Nombre de tu instituto?</option>
                <option value="3">¿Nombre de tu madre?</option>
                <option value="4">¿Nombre de tu padre?</option>
            </select>
            <span></span>
        </p>
        <p>
            <input type="text" name="respuestaRegistro" id="answer" placeholder="Respuesta" title="respuesta">
            <span></span>
        </p>
        <p>
            <button type="submit" value="Enviar">ENVIAR</button>
            <button type="reset" value="Limpiar">LIMPIAR</button>
        </p>
    </form>
    <script type="text/javascript" src="src/javascript/validacionRegistro/validacionSubmit.js"></script>
    <script type="text/javascript" src="src/javascript/validacionRegistro/validacionBlur.js"></script>
    <script type="text/javascript" src="src/javascript/ajax/compruebaUsuario.js"></script>

<?php

$registro = new UsuariosController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){
	if ($_GET["action"] == "ok") {
		echo "Registro completo.";
	}
}


?>
</section>