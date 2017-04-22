<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		
        <title>¡¡Pillo sitio!!</title>	
        <link rel="stylesheet" type="text/css" href="styles/base.css">
    </head>

    <body>
        <nav>
            <?php include "modules/navegacion.php"; ?>      
        </nav>

        <?php
        if (isset($_SESSION["usuario"])) {
            echo '<p>Bienvenido ';
            echo ucfirst($_SESSION["usuario"]) . '</p>';
            if ($_SESSION["notificaciones"] > 0) {
                echo '<p>Tienes ' . $_SESSION["notificaciones"] . ' <a href="index.php?action=verMensajes">mensajes</a></p>';

                /* Esta parte es mejor hacerla con ajax para que se vean las actualizaciones en tiempo real */
            }
        }
        ?> 
        <section>

            <?php
            $mvc = new MvcController();
            $mvc->enlacesPaginasController();
            ?>

        </section>

<?php if (isset($_SESSION["validar"])) { ?>

            <aside>
                <article>

                    <h1>Esto es un ejemplo</h1> 
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>                       
                </article>
                
                <article>

                    <h1>Esto es un ejemplo</h1> 
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>                       
                </article>
                
                <article>

                    <h1>Esto es un ejemplo</h1> 
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>
                    <p>Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto
                        Texto texto texto lorem texto texto texto</p>                       
                </article>

            </aside>


<?php } ?>


        <footer>
        <?php include "modules/footer.php"; ?>

        </footer>

    </body>

</html>