<?php
abstract class BaseModelos 
{
	protected $db;

	public function __construct()
	{
		$this->db = SPDO::singleton();
	}
}
?>