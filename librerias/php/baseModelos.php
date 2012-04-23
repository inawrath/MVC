<?php
abstract class baseModelos 
{
	protected $db;

	public function __construct()
	{
		$this->db = spdo::singleton();
	}
}
?>