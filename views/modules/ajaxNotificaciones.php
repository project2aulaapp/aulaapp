<?php

//sleep(1);
session_start();
require_once '../../models/crud.php'; //requiero el archivo para tener acceso a la clase Datos y su método conectar



$stmt = Datos::conectar()->prepare("SELECT notificaciones from usuario where user='" . $_SESSION["usuario"] . "'");
$stmt -> execute();

$resultado = $stmt->fetch();
if($resultado['notificaciones'] == 1) {   
    echo '<p>Tienes ' . $resultado['notificaciones'] . ' <a href="index.php?action=verMensajes">mensaje</a></p>';
   
}else if ($resultado['notificaciones']>1) {   
    echo '<p>Tienes ' . $resultado['notificaciones'] . ' <a href="index.php?action=verMensajes">mensajes</a></p>';
   
}else{
    echo '<p>Sin notificaciones</p>'; //No tiene notificaciones, pues nada
}
?>
