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

if (isset($_REQUEST['salir'])) { // Si el usuario hace click en el botón 'Salir' 
    session_destroy(); // Se destruye su sesión
    header('Location: Login.php'); //Redirigimos a el usuario al login
    exit;
}

// Se valida si el usuario hace click en el botón 'Detalle' 
if (isset($_REQUEST['detalle'])) {
    // Se redirige al usuario a Detalle
    header('Location: Detalle.php');;
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
            main{
                font-family: consolas, monospace;
                font-weight: bold;
                font-size: 1.2rem;
                width: 500px; 
                margin-top: 2%;
                margin-left: 37%;
                text-align: center;
            }
            
            button{
                width: 300px;
                height: 30px;
                margin-top: 10px; 
                font-weight: bold;
            }
            
            footer a{
                color: #999;
            }
        </style>
    </head>
    <body>
        <header class="text-center">
            <h1>Aplicación LoginLogoffTema5:</h1>
        </header>
        <main>
            <div class="container mt-3">
                <div class="row d-flex justify-content-start">
                    <div class="col">
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
                        if ($_SESSION['NumeroConexiones'] == 1) {
                            echo("<div>Bienvenid@ ".$_SESSION['DescripcionUsuario']." esta es la ".$_SESSION['NumeroConexiones']." vez que te conectas.</div>");
                        } else {
                            echo("<div>Bienvenid@ ".$_SESSION['DescripcionUsuario']." esta es la ".$_SESSION['NumeroConexiones']." vez que te conectas. "
                                . "Usted se conectó por última vez el ".$_SESSION['FechaHoraUltimaConexionAnterior']."</div>");
                        }
                        ?> 
                    </div>
                    <div class="col">
                        <form name="Programa" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <button class="btn btn-secondary" aria-disabled="true" type="submit" name="salir">Cerrar Sesión</button><br>
                            <button class="btn btn-secondary" aria-disabled="true" type="submit" name="detalle">Detalle</button>
                        </form>        
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="https://github.com/kyrafenrir/202DWESLoginLogoffTema5/blob/master/codigoPHP/Programa.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>