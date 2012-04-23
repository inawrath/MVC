<?php
class config
{
    private $variables;
    private static $instancia;
 
    private function __construct()
    {
        $this->variables = array();
    }
    
    //Con set vamos guardando nuestras variables.
    public function guardarVariable($nombre, $valor)
    {
        if(!isset($this->variables[$nombre]))
        {
            $this->variables[$nombre] = $valor;
        }
    }
    
    //Con obtener_var('nombre_de_la_variable') recuperamos un valor.
    public function obtenerVariable($nombre)
    {
        if(isset($this->variables[$nombre]))
        {
            return $this->variables[$nombre];
        }
    }
    
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $c = __CLASS__;
            self::$instancia = new $c;
        }
 
        return self::$instancia;
    }
}
/*
 Uso:
 
 $config = Config::singleton();
 $config->guardar_var('nombre', 'Federico');
 echo $config->obtener_var('nombre');
 
 $config2 = Config::singleton();
 echo $config2->obtener_var('nombre');
 
*/
?>