<?php
/**
 * @author Carlos García Cachón
 * @version 1.0
 * @since 28/11/2023
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Proyecto LoginLogoffTema5 - Parte de 'Programa' 
 * 
 */
session_start(); //Reanudamos la sesion existente
if (!isset($_SESSION['user214DWESLoginLogoffTema5'])) { // Si el usuario no se ha autentificado
    header('Location: Login.php'); //Redirigimos a el usuario al login
    exit();
}
// Se valida si el usuario hace click en el botón 'Detalle' 
if (isset($_REQUEST['atras'])) {
    // Se redirige al usuario al Login
    header('Location: Programa.php'); // Llevo al usuario a la pagina 'Programa.php'
    // Termina el programa
    exit();
}
?>
<!DOCTYPE html>
<!--
        Descripción: CodigoPrograma
        Autor: Carlos García Cachón
        Fecha de creación/modificación: 05/12/2023
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../webroot/css/style.css">
        <title>Erika Martínez Pérez - DWES</title>
        <style>
            button{
                width: 300px;
                height: 30px;
                margin-top: 10px; 
                margin-left: 480px;
                font-weight: bold;
            }
            
            footer a{
                color: #999;
                background: #222;
                text-decoration: dashed;
            }
            
            .ejercicio{
                margin-left: 480px;
            }
        </style>
    </head>

    <body>
        <header class="text-center">
            <h1>Aplication LoginLogoffUnit5:</h1>
        </header>
        <main>
            <div class="container mt-3">
                <div class="row d-flex justify-content-start">
                    <div>
                        <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <button aria-disabled="true" type="submit" name="atras">Back</button>
                        </form>        
                    </div>
                    <div class="col">
                        <?php
                        /*
                        * @author Rebeca Sánchez Pérez
                        * @version 1.1
                        * @since 05/11/2023
                        *
                        * @Annotation Proyecto LoginLogoffTema5 - Parte de 'Detalle' 
                        * 
                        */
                        // $_SESSION
                        echo('<div class="ejercicio">');
                        echo('<h3>$_SESSION</h3>');
                        foreach ($_SESSION as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_COOKIE
                        echo('<div class="ejercicio">');
                        echo('<h3>$_COOKIE</h3>');
                        foreach ($_COOKIE as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_SERVER
                        echo('<div class="ejercicio">');
                        echo('<h3>$_SERVER</h3>');
                        foreach ($_SERVER as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $GLOBALS
                        echo('<div class="ejercicio">');
                        echo('<h3>$GLOBALS</h3>');
                        foreach ($GLOBALS as $key => $valor) {
                            foreach ($valor as $clave => $valor2) {
                                echo('<u>' . $clave . '</u> => <b>' . $valor2 . '</b><br>');
                            }
                        }
                        echo('</div>');

                        // $_GET
                        echo('<div class="ejercicio">');
                        echo('<h3>$_GET</h3>');
                        foreach ($_GET as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_POST
                        echo('<div class="ejercicio">');
                        echo('<h3>$_POST</h3>');
                        foreach ($_POST as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_FILES
                        echo('<div class="ejercicio">');
                        echo('<h3>$_FILES</h3>');
                        foreach ($_FILES as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_REQUEST
                        echo('<div class="ejercicio">');
                        echo('<h3>$_REQUEST</h3>');
                        foreach ($_REQUEST as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // $_ENV
                        echo('<div class="ejercicio">');
                        echo('<h3>$_ENV</h3>');
                        foreach ($_ENV as $key => $valor) {
                            echo('<u>' . $key . '</u> => <b>' . $valor . '</b><br>');
                        }
                        echo('</div>');

                        // Se muestra en pantalla la información de PHP de nuestro servidor
                        phpinfo();
                        ?> 
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p>2023-2024 © All rights reserved. <a href="https://github.com/kyrafenrir/202DWESLoginLogoffTema5/blob/master/codigoPHP/Detalle.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>