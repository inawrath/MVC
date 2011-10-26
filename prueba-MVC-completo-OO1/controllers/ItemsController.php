<?php
/**
 */
class ItemsController
{
	function __construct()
	{
	    //Creamos una instancia de nuestro mini motor de plantillas
	    $this->view = new View();
	}
 
	public function listar()
	{
		//Incluye el modelo que corresponde
		require 'models/ItemsModel.php';
 
		//Creamos una instancia de nuestro "modelo"
		$items = new ItemsModel();
 
		//Le pedimos al modelo todos los items
		$listado = $items->listadoTotal();
 
		//Pasamos a la vista toda la información que se desea representar
		$data['listado'] = $listado;
 
		//Finalmente presentamos nuestra plantilla
		$this->view->show("listar.php", $data);
	}
 
	public function agregar()
	{
		echo 'Aquí incluiremos nuestro formulario para insertar items';
	}
}
?>