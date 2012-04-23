<?php
$config = config::singleton();

/*Base de Datos compartida*/
/*$config->guardarVariable('dbhost', 'lacubb.sytes.net');
$config->guardarVariable('dbname', 'lac');
$config->guardarVariable('dbuser', 'jona');
$config->guardarVariable('dbpass', 'jerusalen22');//*/

/*base de datos de pruebas*/
$config->guardarVariable('dbhost', 'localhost');
$config->guardarVariable('dbname', 'lac');
$config->guardarVariable('dbuser', 'root');
$config->guardarVariable('dbpass', '');//*/


/*url principal de la pagina por ahora es http://localhost/LAC/ despues pasara a ser http://lasamericascapacitacion.cl*/
$config->guardarVariable('url','http://localhost/MVC/');


//Carpetas principales
$config->guardarVariable('carpetaControladores', 'controladores/');
$config->guardarVariable('carpetaModelos', 'modelos/');
$config->guardarVariable('carpetaVistas', 'vistas/');

//Carpetas de estilos y script propios y externos
$config->guardarVariable('carpetaCss',$config->obtenerVariable('url').'librerias/css/');
$config->guardarVariable('carpetaJs',$config->obtenerVariable('url').'librerias/js/');
$config->guardarVariable('carpetaExt',$config->obtenerVariable('url').'librerias/externas/');

$config->guardarVariable('Favicon','http://localhost/MVC/img/favicon.ico');
?>