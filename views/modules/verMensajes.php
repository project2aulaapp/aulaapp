<?php
if (!isset($_SESSION)) {
    session_start();
}

echo "datos de depuración:<br>";
echo "userID: " . $_SESSION["userId"] . "<br>";
echo "rolID: " . $_SESSION["rol"] . "<br>";
echo "Usuario: " . $_SESSION["usuario"];

if (!$_SESSION["validar"]) {
    header("location:index.php?action=login");
    exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
}

/*
  if(($_SESSION["rol"] == 1) || ($_SESSION["rol"] == 2) ){ //si no es profesor (rol 2) o administrador (rol 1) lo lleva fuera

  }else{
  header("location:index.php?action=index");
  }
 */
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