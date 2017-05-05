<?php
sleep(.5);

require_once '../../models/crud.php'; //requiero el archivo para tener acceso a la clase Datos y su método conectar

if($_GET) {
    $username = $_GET['username'];
    $respuesta = Datos::conectar()->prepare("SELECT user from usuario where user='$username'");
    $respuesta->execute();  
    
    if ($respuesta->rowCount()>0) {
        //echo '<div id="Error">Usuario ya existente</div>';
        echo 'Usuario ya existente';
    }else{
        echo 'Disponible';
    }    
    
}
?>

