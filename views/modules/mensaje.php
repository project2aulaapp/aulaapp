<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>
<section id="enviarMsg">
<h1>Enviar Mensaje</h1>

<form method="post">

    <?php 
        $remitente = new MensajesController();
        $remitente->listarDestinatariosController();
    ?>

    

    <input type="hidden" name="remitente" value= "<?php echo $_SESSION['userId']; ?>">

    <input type="text" placeholder="Asunto" name="asunto" required>

    <textarea placeholder="Escribe aquí tu mensaje" name="cuerpo"  rows="8" cols="50" required>	</textarea>

    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar">

</form>

<?php
$mensaje = new MensajesController();
$mensaje->mensajeNuevoController();

if (isset($_GET["action"])) {
    if ($_GET["action"] == "ok") {
        echo "Mensaje enviado.";
    }
}
?>

</section>