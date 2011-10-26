<?php
function listar()
{
	//Incluye el modelo que corresponde
	require 'modelos/itemsModelo.php';
 
	//Le pide al modelo todos los items
	$items = buscarTodosLosItems($db);
 
	//Pasa a la vista toda la información que se desea representar
	require 'vistas/listar.php';
}
?>