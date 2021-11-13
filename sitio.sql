/*NO TOCAR ESTAS 3 LÍNEAS DE CÓDIGO*/
DROP DATABASE IF EXISTS sitio2;
CREATE DATABASE IF NOT EXISTS sitio2;
USE sitio2;
/*SE ELIMINA LA BASE DE DATOS Y SE ACTUALIZA CON LOS DATOS GUARDADOS EN ESTE ARCHIVO*/


/*----------------------------------------------*/
/*----------------------------------------------*/
/*APARTIR DE AQUÍ AÑADIR SUS TABLAS Y REGISTROS */
/*----------------------------------------------*/
/*----------------------------------------------*/

/*--------------SECCION DE TABLAS-------------- */

/*tablas Publicas*/

CREATE TABLE libro(
    sql_libro_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_libro_nombre VARCHAR(50) NOT NULL,
    sql_libro_imagen VARCHAR(1000) NOT NULL

);

/*tablas de Brafer*/


/*tablas de Piero*/


/*tablas de Walter*/



/*-------------SECCION DE REGISTROS-------------*/

/*registros Publicos*/
INSERT INTO libro (sql_libro_nombre,sql_libro_imagen) VALUES
    ('Libro de PHP','imagen_php.jpg'),
    ('Libro de HTML','imagen_html.jpg');


/*registros de Brafer*/


/*registros de Piero*/


/*registros de Walter*/
