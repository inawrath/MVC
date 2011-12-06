<?php
class ControladorPrincipal
{
	static function main()
	{
		//Incluimos algunas clases:
		
		require 'librerias/Config.php'; //de configuracion
		require 'librerias/SPDO.php'; //PDO con singleton
		require 'librerias/BaseControladores.php'; //Clase controlador base
		require 'librerias/BaseModelos.php'; //Clase modelo base
		require 'librerias/BaseVistas.php'; //Mini motor de plantillas
		
		require 'config.php'; //Archivo con configuraciones.
		
		//Con el objetivo de no repetir nombre de clases, nuestros controladores
		//terminaran todos en controlador. Por ej, la clase controladora Items, será ItemsControlador
		
		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexControlador
		if(! empty($_GET['controlador']))
		      $NombreControlador = $_GET['controlador'] . 'Controlador';
		else
		      $NombreControlador = "IndexControlador";
		
		//Lo mismo sucede con las acciones, si no hay accion, tomamos index como accion
		if(! empty($_GET['accion']))
		      $NombreAccion = $_GET['accion'];
		else
		      $NombreAccion = "index";
		
		$RutaControlador = $config->obtener_var('CarpetaControladores') . $NombreControlador . '.php';
			
		//Incluimos el fichero que contiene nuestra clase controladora solicitada	
		if(is_file($RutaControlador))
		      require $RutaControlador;
		else
		      die('El controlador no existe - 404 not found');
		
		//Si no existe la clase que buscamos y su accion, tiramos un error 404
		if (is_callable(array($NombreControlador, $NombreAccion)) == false) 
		{
			trigger_error ($NombreControlador . '->' . $NombreAccion . '` no existe', E_USER_NOTICE);
			return false;
		}
		//Si todo esta bien, creamos una instancia del controlador y llamamos a la accion
		$controlador = new $NombreControlador();
		$controlador->$NombreAccion();
	}
}
?>