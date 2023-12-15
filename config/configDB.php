<?php
/**
 * @author Carlos García Cachón
 * @version 1.2 
 * adaptado por @author Erika Martínez Pérez
 * @since 02/12/2023
 */ 

if ($_SERVER['SERVER_NAME'] == 'daw202.isauces.local') {
    define('dsn', 'mysql:host=192.168.20.19;dbname=DB202DWESLoginLogoffTema5'); // Host 'IP' y nombre de la base de datos
    define('usuario','user202DWESLoginLogoffTema5'); // Nombre de usuario de la base de datos
    define('password','paso'); // Contraseña de la base de datos

    // Archivo de configuración de la BD de Explotación
    } elseif ($_SERVER['SERVER_NAME'] == 'daw202.ieslossauces.es') {
        define('dsn', 'mysql:host=db5014806730.hosting-data.io;dbname=dbs12302406'); // Host y nombre de la base de datos
        define('usuario','dbu1907033'); // Nombre de usuario de la base de datos
        define('password','daw2_Sauces'); // Contraseña de la base de datos
    }
?>