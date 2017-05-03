<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">

        <title>¡¡Pillo sitio!!</title>	
        <link rel="stylesheet" type="text/css" href="src/styles/baseOld.css">
        <!-- <link rel="stylesheet" type="text/css" href="src/styles/index/maestro.css">-->
    </head>

    <body> 
        
        <?php
            session_start();                    
        ?>        
        <main> <!-- Contenedor de la web -->
            

            <div id="depuracion">
                <?php
                if (isset($_SESSION["validar"])) {
                    echo 'Datos de depuración:<br>';
                    echo "userID: " . $_SESSION["userId"] . " --||-- ";
                    echo "rolID: " . $_SESSION["rol"] . "<br>";
                    echo "Usuario: " . $_SESSION["usuario"] . " --||--  ";
                    echo "Matriculado: " . $_SESSION["inscrito"] . '<br>';
                    echo "Inscrito en asignaturas: " . $_SESSION["inscritoAsignaturas"].'--||-- ';
                    echo "Fallos login: ".$_SESSION["fallosLogin"];
                }
                ?>
            </div>

            <nav>
                <a href="index.php"><img src="src/img/logotipo.jpeg"></a>
                <?php
                if (!isset($_SESSION["validar"])) {

                    /* Navegación para cuando no estemos logueados o registrados */
                    echo '<a href="index.php?action=login">Login</a>
                          <a href="index.php?action=registro">Registro</a>';

                    //exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
                }

                if (isset($_SESSION["usuario"])) {
                    echo '<p>Bienvenido ';
                    echo ucfirst($_SESSION["usuario"]) . '      </p>';
                    echo '<a href="index.php?action=salir">Salir</a>';
                    if ($_SESSION["notificaciones"] > 0) {
                        echo '<p>Tienes ' . $_SESSION["notificaciones"] . ' <a href="index.php?action=verMensajes">mensajes</a></p>';

                        /* Esta parte es mejor hacerla con ajax para que se vean las actualizaciones en tiempo real */
                    }
                }
                ?>
            </nav>


            <section>

<?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>

            </section>

<?php if (isset($_SESSION["validar"])) { ?>

                <aside>
                <?php include "modules/navegacion.php"; ?>   

                </aside>


<?php } ?>


            <footer>
<?php include "modules/footer.php"; ?>

            </footer>
        </main>
    </body>

</html>