/**
 * Author:  Erika Martínez Pérez
 * Created: 3 dic 2023
 */

-- Elimino el usuario de la base de datos
DROP USER  user202DWESLoginLogoffTema5;

-- Cambio a una base de datos diferente antes de eliminarla (En este caso la que crea por defecto 'mysql')
USE mysql;

-- Elimino la base de datos
DROP DATABASE DB202DWESLoginLogoffTema5;
