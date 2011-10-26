<?php
global $servidor, $bd, $usuario, $contrasenia;
$db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia);
 
function buscarTodosLosItems($db)
{
	$consulta = $db->prepare('SELECT * FROM items');
	$consulta->execute();
	return $consulta->fetchAll();
}
?>