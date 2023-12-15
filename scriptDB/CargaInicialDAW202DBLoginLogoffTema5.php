<?php
try {
    // Configuración de conexión con la base de datos
    define('dsn', 'mysql:host=db5014806730.hosting-data.io;dbname=dbs12302406'); // Host y nombre de la base de datos
    define('usuario','dbu1907033'); // Nombre de usuario de la base de datos
    define('password','daw2_Sauces'); // Contraseña de la base de datos
    // Crear conexion DB
    $conn = new PDO(dsn, usuario, password);

    // Utilizar la base de datos 
    $query1 = "USE dbs12302406;";

    // Inserto los datos iniciales en la tabla T02_Departamento
    $query2 = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
        ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
        ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
        ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00')";
    
    // Inserto los datos iniciales en la tabla T01_Usuario con contraseñas cifradas en SHA-256
    $query3 = "INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
        ('admin', SHA2(CONCAT('admin','paso'), 'administrador', 'administrador'),
        ('alvaro', SHA2(CONCAT('alvaro','paso'), 'Álvaro Cordero Miñambres', 'usuario'),
        ('carlos', SHA2(CONCAT('carlos','paso'), 'Carlos García Cachón', 'usuario'),
        ('oscar', SHA2(CONCAT('oscar','paso'), 'Oscar Pascual Ferrero', 'usuario'),
        ('borja', SHA2(CONCAT('borja','paso'), 'Borja Nuñez Refoyo', 'usuario'),
        ('rebeca', SHA2(CONCAT('rebeca','paso'), 'Rebeca Sánchez Pérez', 'usuario'),
        ('erika', SHA2(CONCAT('erika','paso'), 'Erika Martínez Pérez', 'usuario'),
        ('ismael', SHA2(CONCAT('ismael','paso'), 'Ismael Ferreras García', 'usuario'),
        ('heraclio', SHA2(CONCAT('heraclio','paso'), 'Heraclio Borbujo Moran', 'administrador'),
        ('amor', SHA2(CONCAT('amor','paso'), 'Amor Rodriguez Navarro', 'administrador'),
        ('alberto', SHA2(CONCAT('alberto','paso'), 'Alberto Bahillo Fernandez', 'administrador'),
        ('antonio', SHA2(CONCAT('antonio','paso'), 'Antonio Jañez Velada', 'administrador')";

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



