<?php
class BaseVistas
{
	function __construct() 
	{
	}

	public function desplegar($nombre, $variables = array()) 
	{
		//$nombre es el nombre de nuestra plantilla, por ej, listado.php
		//$vars es el contenedor de nuestras variables, es un arreglo del tipo llave => valor, opcional.
		
		//Traemos una instancia de nuestra clase de configuracion.
		$config = Config::singleton();
                
		//Armamos la ruta a la plantilla HTML
		$plantillaHTML = $config->obtener_var('CarpetaVistas') . $nombre;

		//Si no existe el fichero en cuestion, tiramos un 404
		if (file_exists($plantillaHTML) == false) 
		{
			trigger_error ('La Vista `' . $plantillaHTML . '` no existe.', E_USER_NOTICE);
			return false;
		}
		
		//Si hay variables para asignar, las pasamos una a una.
		if(is_array($variables))
		{
                    foreach ($variables as $key => $value) 
                    {
                	$$key = $value;
                    }
                }
                
		//Finalmente, incluimos la plantilla.
		include($plantillaHTML);
	}
}
/*
 El uso es bastante sencillo:
 $vista = new BaseVistas();
 $vista->desplegar('listado.php', array("nombre" => "Juan"));
 
 o
  
  
  
 
*/
?>