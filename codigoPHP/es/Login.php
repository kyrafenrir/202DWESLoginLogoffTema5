<?php
/**
 * @author Erika Martínez Pérez
 * @version 1.0
 * @since 11/12/2023
 * 
 */
// Incluyo la librería de validación para comprobar los campos y el fichero de configuración de la BD
require_once '../../core/231018libreriaValidacion.php';
require_once "../../config/configDB.php";

$entradaOK = true;

// Declaramos el array de errores y lo inicializamos a null
$aErrores = ['user' => null,
    'password' => null];

if (isset($_REQUEST['Login'])) { // Comprobamos que el usuario haya enviado el formulario
    $aErrores['user'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['user'], 15, 3, 1);
    $aErrores['password'] = validacionFormularios::validarpassword($_REQUEST['password'], 8, 3, 1, 1);
    try {// validamos que el nombre de usuario 'user' sea correcto
        $miDB = new PDO(dsn, usuario, password); // Instanciamos un objeto PDO y establecemos la conexión

        $sqlUsuario = 'SELECT * FROM T01_Usuario WHERE T01_CodUsuario="' . $_REQUEST['user'] . '" AND T01_Password="' . hash("sha256", ($_REQUEST['user'] . $_REQUEST['password'])) . '";';
        $consultaUsuario = $miDB->prepare($sqlUsuario); //Preparamos la consulta

        $consultaUsuario->execute();
        $oUsuarioEnCurso = $consultaUsuario->fetchObject();

        if ($consultaUsuario->rowCount() <= 0) {
            $aErrores['user'] = "Error autentificación"; // Almacenamos un mensaje de error en el array de errores
            $aErrores['password'] = "Error autentificación"; // Almacenamos un mensaje de error en el array de errores
        }
    } catch (PDOException $miExcepcionPDO) {
        $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
        $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

        echo "<span class='errorException'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
        echo "<span class='errorException'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    }
    // Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {
        if ($error != null) { // Comprobamos que el campo no esté vacio
            $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario
            $_REQUEST[$campo] = ""; // Limpiamos los campos del formulario
        }
    }
} else {
    $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
}
if ($entradaOK) { // Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
    try {// validamos que el nombre de usuario 'user' sea correcto
        // Se almacenan el numero de conexiones en $nConexiones
        $nConexiones = ($oUsuarioEnCurso->T01_NumConexiones) + 1;
        // Se almacenan la fecha y hora de la ultima conexion en un objeto datetime
        $oFechaHoraUltimaConexionAnterior = new DateTime($oUsuarioEnCurso->T01_FechaHoraUltimaConexion);

        
        session_start(); // Iniciamos la sesión
        // Se almacena en una variable de sesión el codigo del usuario
        $_SESSION['user214DWESLoginLogoffTema5'] = $oUsuarioEnCurso->T01_CodUsuario;
        // Se almacena en una variable de sesión el nombre completo del usuario
        $_SESSION['DescripcionUsuario'] = $oUsuarioEnCurso->T01_DescUsuario;
        // Se almacena la fecha hora de la última conexión en una variable de sesión
        if ($nConexiones > 1) {
            $_SESSION['FechaHoraUltimaConexionAnterior'] = $oFechaHoraUltimaConexionAnterior->format('Y-m-d H:i:s');
        }
        // Se almacena en una variable de sesión el numero de conexiones
        $_SESSION['NumeroConexiones'] = $nConexiones;
        
        $sqlUpdate = 'UPDATE T01_Usuario SET T01_NumConexiones =' . $nConexiones . ', T01_FechaHoraUltimaConexion=now() WHERE T01_CodUsuario="' . $_REQUEST['user'] . '";';
        $consultaUpdate = $miDB->prepare($sqlUpdate); // Preparamos la consulta
        $consultaUpdate->execute(); // Pasamos los parámetros a la consulta

        header('Location: Programa.php'); // Llevo al usuario a la pagina 'Programa.php'
        exit();
    } catch (PDOException $miExcepcionPDO) {
        $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
        $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

        echo "<span class='errorException'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
        echo "<span class='errorException'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    } finally {
        unset($miDB); //Cerramos la conexión con la base de datos
    }
} else {// Si el usuario no ha rellenado el formulario correctamente volverá a rellenarlo
    ?>
    <!DOCTYPE html>
    <!--
            Descripción: CodigoLogin
            Autor: Carlos García Cachón
            Fecha de creación/modificación: 02/11/2023
    -->
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../../webroot/css/style.css">
            <title>Erika Martínez Pérez - DWES</title>
            <style>
                .inicio{
                    padding-left: 36%;
                    padding-top: 5%;
                    font-size: 1.6rem;
                    font-weight: bold;
                    font-family: consolas, monospace;
                }
                
                .inicio label:nth-of-type(1){
                    margin-right: 43px;
                }
                
                legend{
                    margin-left: 180px;
                    margin-bottom: 10px;
                }
                
                button{
                    width: 300px; height: 30px;
                    margin-left: 120px;
                    margin-top: 20px;
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
                <div>
                    <div>
                        <div class="inicio">
                            <!-- Codigo del formulario -->
                            <form name="controlAcceso" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <legend>Iniciar Sesión</legend>
                                    <!-- CodDepartamento Obligatorio -->
                                    <label for="user">Introduce usuario:</label>
                                    <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                    comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                    que contiene '$_REQUEST' , en caso falso sobrescribirá el campo a '' .-->
                                    <input type="text" name="user" value="<?php echo (isset($_REQUEST['user']) ? $_REQUEST['user'] : ''); ?>" size="30">
                                    <?php
                                        if (!empty($aErrores['user'])) {
                                            echo $aErrores['user'];
                                        }
                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                                    <!-- CodDepartamento Obligatorio -->
                                    <br><label for="password">Introduce contraseña:</label>
                                    <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                         comprobamos que exista la variable y no sea 'null'. En el caso verdadero devolveremos el contenido del campo
                                         que contiene '$_REQUEST' , en caso falso sobrescribirá el campo a '' .-->
                                    <input type="password" name="password" value="<?php echo (isset($_REQUEST['password']) ? $_REQUEST['password'] : ''); ?>" size="30">
                                    <?php
                                        if (!empty($aErrores['password'])) {
                                            echo $aErrores['password'];
                                        }
                                    ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no está vacío, si es así, mostramos el error. -->
                                    <div>
                                        <button  type="submit" name="Login">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="https://github.com/kyrafenrir/202DWESLoginLogoffTema5/blob/master/codigoPHP/Login.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>