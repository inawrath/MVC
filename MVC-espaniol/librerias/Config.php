<?php

class Config {

    private $variables;
    private static $instancia;

    private function __construct() {
        $this->variables = array();
    }

    //Con guardar_var('nombre','valor') vamos guardando nuestras variables.
    public function guardar_var($nombre, $valor) {
        if (!isset($this->variables[$nombre])) {
            $this->variables[$nombre] = $valor;
        }
    }

    //Con obtener_var('nombre_de_la_variable') recuperamos un valor.
    public function obtener_var($nombre) {
        if (isset($this->variables[$nombre])) {
            return $this->variables[$nombre];
        }
    }

    public static function singleton() {
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
  echo $config2->guardar_var('nombre');

 */
?>