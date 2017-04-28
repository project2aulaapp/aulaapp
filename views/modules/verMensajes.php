<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}
?>

<h1>Mensajes</h1>

<table border="1">

    <thead>

        <tr>
            <th>Remitente</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Fecha de envío</th>
            <th>Destinatario</th>
            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>
        <?php
        $vistaUsuario = new mensajesController();
        $vistaUsuario->vistaMensajesController();
        $vistaUsuario->borrarMensajeController();
        ?>


    </tbody>
</table>

<?php
if (isset($_GET["action"])) {
    if ($_GET["action"] == "cambio") {
        echo "Cambio correcto.";
    }
}
?>