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
                <option value="1">Mascota</option>
                <option value="2">Instituto</option>
                <option value="3">Madre</option>
                <option value="4">Padre</option>
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
    <script type="text/javascript" src="javascript/validacionSubmit.js"></script>
    <script type="text/javascript" src="javascript/validacionBlur.js"></script>

<?php

$registro = new UsuariosController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){
	if ($_GET["action"] == "ok") {
		echo "Registro completo.";
	}
}


?>