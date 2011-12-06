<?php
class SPDO extends PDO 
{
	private static $instance = null;

	public function __construct() 
	{
		$config = Config::singleton();
		parent::__construct('mysql:host=' . $config->obtener_var('dbhost') . ';dbname=' . $config->obtener_var('dbname'), $config->obtener_var('dbuser'), $config->obtener_var('dbpass'));
	}

	public static function singleton() 
	{
		if( self::$instance == null ) 
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
}
?>