<?php
/**
 */
class ItemsModel
{
	protected $db;
 
	public function __construct()
	{
		//Traemos la unica instancia de PDO
		$this->db = SPDO::singleton();
	}
 
	public function listadoTotal()
	{
		//realizamos la consulta de todos los items
		$consulta = $this->db->prepare('SELECT * FROM items');
		$consulta->execute();
		//devolvemos la colección para que la vista la presente.
		return $consulta;
	}
}
?>
