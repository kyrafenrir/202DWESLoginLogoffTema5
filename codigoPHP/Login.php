<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../webroot/css/style.css">
        <title>Erika Martínez Pérez - DWES</title>
        <style>
            *{
                box-sizing: border-box;
            }
            
            main{
                font-size: 1.2rem;
                font-family: consolas, monospace;
                font-weight: bold;
            }
            
            main p{
                margin-left: 310px;
                margin-bottom: 0;
                padding-bottom: 0;
            }
            
            input{
                margin-left: 310px;
                width: 250px;
            }
            
            input:last-child{
                margin-top: 10px;
                width: 250px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>TEMA 5: APLICACION LOGIN / LOGOFF</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 23/10/2023
                 */
            
                // Utilizacion de la libreria de validacion donde se incluyen los metodos de validacion de las entradas del formulario
                require_once '../core/231018libreriaValidacion.php';
                // Inicializacion de variables
                $entradaOK = true; // Inizacion de la variable que indica que todo en el formulario esta correctamente
                $aErrores = [
                    'usuario' => '',
                    'password' => '',
                ]; // Inicializacion del array donde recogemos los errores 
                $aRespuestas = [
                    'usuario' => '',
                    'password' => '',
                ]; // Inicializacion del array donde recogemos las respuestas
                
                // Fecha actual para valor predeterminado
                $oFecha = new DateTime();
                
                // Cargar valores por defecto en los campos del formulario
                if(isset($_REQUEST['submit'])){
                    // Validacion de la entrada y actuar en consecuencia
                    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],8,4,1);
                    
                    // Foreach para recorrer el array de errores
                    foreach($aErrores as $campo => $error){
                        // Si existe algun error la entrada pasa a ser false
                        if($error != null){
                            
                            $_REQUEST[$campo] = '';
                            $entradaOK = false;
                        }
                    }
                } else {
                    // El formulario no se ha rellenado nunca
                    $entradaOK = false;
                }
                
                // Código que se ejecuta cuando se envía el formulario y muestra de los valores
                if ($entradaOK){
                    // Tratamiento de datos
                    echo "Bienvenido: ".$_REQUEST['usuario']."<br>";
                // Código que se ejecuta antes de rellenar el formulario y muestra el formulario
                } else {
                    // Mostrar el formuilario hasta que rellenemos correctamente
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="loginlogoff">
                        <div>
                            <p>INICIAR SESION:</p>
                            <br>
                            <input type="text" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>" placeholder="Escribe tu nombre de usuario." size="30"><?php echo(' <span>'.$aErrores['usuario'].'</span>');?>
                            <br>
                            <input type="text" name="password" value="<?php echo (isset($_REQUEST['password']) ? $_REQUEST['password'] : ''); ?>" placeholder="Escribe tu password." size="30"><?php echo(' <span>'.$aErrores['password'].'</span>');?>
                            <br>
                            <input type="submit" name="submit" value="INICIAR SESION">
                        </div>
                    </form>
                    <?php
                }
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../202DWESProyectoDWES/indexProyectoDWES.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>