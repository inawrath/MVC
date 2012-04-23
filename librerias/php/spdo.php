<?php

class spdo extends PDO {

    private static $instance = null;

    public function __construct() {
        $config = config::singleton();
        parent::__construct('mysql:host=' . $config->obtenerVariable('dbhost') . ';dbname=' . $config->obtenerVariable('dbname'), $config->obtenerVariable('dbuser'), $config->obtenerVariable('dbpass'));
    }

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}

?>