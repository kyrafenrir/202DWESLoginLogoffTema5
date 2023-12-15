<?php
try {
    // Configuración de conexión con la base de datos
    define('dsn', 'mysql:host=db5014806730.hosting-data.io;dbname=dbs12302406'); // Host y nombre de la base de datos
    define('usuario','dbu1907033'); // Nombre de usuario de la base de datos
    define('password','daw2_Sauces'); // Contraseña de la base de datos
    // Crear conexion DB
    $conn = new PDO(DSN, USERNAME, PASSWORD);

    // Utilizar la base de datos 
    $query1 = "USE dbs12302406;";

    // Elimino la tabla T02_Departamento
    $query2 = "DROP TABLE T02_Departamento";
    
    // Elimino la tabla T01_Usuario 
    $query3 = "DROP TABLE T01_Usuario";

    // Ejecutar consultas SQL
    $sql_queries = [$query1, $query2, $query3];

    foreach ($sql_queries as $query) {
        if ($conn->query($query) === FALSE) {
            throw new Exception("Error al ejecutar la consulta: $query - " . $conn->error);
        }
        echo "Consulta ejecutada con éxito: $query<br>";
    }
} catch (PDOException $miExcepcionPDO) {
    $errorExcepcion = $miExcepcionPDO->getCode(); // Almacenamos el código del error de la excepción en la variable '$errorExcepcion'
    $mensajeExcepcion = $miExcepcionPDO->getMessage(); // Almacenamos el mensaje de la excepción en la variable '$mensajeExcepcion'

    echo "<span style='red'>Error: </span>" . $mensajeExcepcion . "<br>"; // Mostramos el mensaje de la excepción
    echo "<span style='red'>Código del error: </span>" . $errorExcepcion; // Mostramos el código de la excepción
    die($miExcepcionPDO);
} finally {
    // Cerrar la conexión
    if (isset($conn)) {
        $conn = null;
    }
}



