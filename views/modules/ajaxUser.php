<?php
sleep(.5);

require_once '../../models/crud.php'; //requiero el archivo para tener acceso a la clase Datos y su método conectar

if($_GET) {
    $username = $_GET['username'];
    $respuesta = Datos::conectar()->prepare("SELECT user from usuario where user='$username'");
    $respuesta->execute();  
    
    if ($respuesta->rowCount()>0) {
        //Usuario ya existente
        echo 0;
    }else{
        //Disponible
        echo 1;
    }    
    
}
?>

