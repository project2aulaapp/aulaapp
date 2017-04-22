<?php
session_start();
session_destroy();
header("location:index.php");
?>


<h1>¡Has salido de la aplicación!</h1>