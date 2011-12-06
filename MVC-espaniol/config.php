<?php
$config = Config::singleton();

$config->guardar_var('CarpetaControladores', 'controladores/');
$config->guardar_var('CarpetaModelos', 'modelos/');
$config->guardar_var('CarpetaVistas', 'vistas/');

$config->guardar_var('dbhost', 'localhost');
$config->guardar_var('dbname', 'prueba');
$config->guardar_var('dbuser', 'root');
$config->guardar_var('dbpass', '');
?>