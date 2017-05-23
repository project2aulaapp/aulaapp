<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>¡¡Pillo sitio!!</title>	
        <!--<link rel="stylesheet" type="text/css" href="src/styles/baseOld.css">-->
        <link rel="stylesheet" type="text/css" href="src/styles/maestro.css">
        <link rel="shortcut icon" href="src/img/favicon.png"/>
        <script src="src/javascript/ventanaModal/app.js"></script>
        <script src="src/javascript/timeoutMensaje/timeoutMensaje.js"></script>
        <script src="src/javascript/paraIndex/cambiarColor.js"></script>

    </head>

    <body> 
        
        <?php
            session_start();                    
        ?>        
        <main> <!-- Contenedor de la web -->
            

            <div id="depuracion"><!-- esto desaparecerá, pero hay que conservar en el css las instrucciones para el id=depuracion -->
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

            <?php
            if(isset($_SESSION["rol"])){
                if($_SESSION["rol"]==1){
                        echo '<header id="adminHeader">';
                    }else if($_SESSION["rol"]==2){
                        echo '<header id="profeHeader">';
                    }else if($_SESSION["rol"]==3){
                        echo '<header id="alumnoHeader">';
                    }else if($_SESSION["rol"]==4){
                        echo '<header id="indexHeader">';
                    }
            }else{
                echo '<header id="indexHeader">';
            }
            ?>
            
                <a href="index.php"><img src="src/img/logotipo_4.png"></a>
                <?php
                if (!isset($_SESSION["validar"])) {

                    /* Navegación para cuando no estemos logueados o registrados */
                    echo '<div><a href="index.php?action=login">Login</a>
                          <a href="index.php?action=registro">Registro</a></div>';

                    //exit(); //usando el método exit() hacemos que nadie pueda, de ninguna forma continuar el script y alterarlo. 
                }

                if (isset($_SESSION["usuario"])) {
                    echo '<div id="logueado"><p><b>Usuario: </b> ';
                    echo ucfirst($_SESSION["usuario"]) . '      </p>';
                    echo '<span id="notificaciones"></span>'; // aquí se insertarán las notificaciones, se puede mover donde sea.
                    echo '<a href="index.php?action=salir">Salir</a></div>';
                
                    
                    /*if ($_SESSION["notificaciones"] > 0) {
                        echo '<p>Tienes ' . $_SESSION["notificaciones"] . ' <a href="index.php?action=verMensajes">mensajes</a></p>';

                        /* Esta parte es mejor hacerla con ajax para que se vean las actualizaciones en tiempo real */
                  //  }
                }
                ?>
            </header>

            <section id="contenedor">
<?php if (isset($_SESSION["validar"])) { ?>
            <input type="checkbox" id="btnMenu">
            <label for="btnMenu"></label>
            <aside id="menuWeb">
                <?php include "modules/navegacion.php"; ?>   

            </aside>
 <?php } ?>


<?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>

                
            </section>




            <footer>
<?php include "modules/footer.php"; ?>

            </footer>
            
            <div id="myModal" class="modal-content">
                <div class="modal-body">
                    <p id="infoCookies">
                        Utilizamos cookies propias y de terceros para ofrecerte un mejor servicio. Si continúas navegando, consideramos que aceptas
                        expresamente su utilización. Puedes obtener más información de cómo gestionar y configurar las cookies en
                        nuestra <a href="">Política de Cookies</a>.
                    </p>
                </div>
                <div class="modal-footer">
                    <button id="accept" class="btn">Aceptar</button>
                </div>
            </div>

        </main>
    </body>
  <?php if (isset($_SESSION["validar"])) {  //si no está logueado, no carga el script
    echo '<script type="text/javascript" src="src/javascript/ajax/notificaciones.js"></script>';
    echo  '<script src="src/javascript/paraIndex/menu.js"></script>';
  }
    ?>
</html>
