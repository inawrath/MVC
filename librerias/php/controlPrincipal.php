<?php

class controlPrincipal {

    static function main($var) {

        //Incluimos algunas clases
        require 'librerias/php/config.php'; //de configuracion
        require 'librerias/php/spdo.php'; //PDO con singleton
        require 'librerias/php/baseControladores.php'; //Clase controlador base
        require 'librerias/php/baseModelos.php'; //Clase modelo base
        require 'librerias/php/baseVistas.php'; //Mini motor de plantillas
        require 'librerias/php/header.php'; //header para todos los archivos css js incl metas
        require 'librerias/php/autentificacion.php'; //header para todos los archivos css js incl metas
        //Archivo con configuraciones.
        include 'variablesDeConfiguracion.php';

        //Con el objetivo de no repetir nombre de clases, nuestros controladores
        //terminaran todos en controlador. Por ej, la clase controladora inicio, será inicioControlador
        //Formamos el nombre del Controlador o en su defecto, tomamos inicioControlador
        if (!empty($var['controlador'])) {
            $nombreControlador = $var['controlador'] . 'Controlador';
        } else {
            $nombreControlador = "inicioControlador";
        }
        print_r($var);
        //Lo mismo sucede con las acciones, si no hay accion, tomamos inicio como accion
        if (!empty($var['accion'])) {
            $nombreAccion = $var['accion'];
        } else {
            $nombreAccion = "inicio";
        }

        $RutaControlador = $config->obtenerVariable('carpetaControladores') . $nombreControlador . '.php';

        //Incluimos el fichero que contiene nuestra clase controladora solicitada	
        if (is_file($RutaControlador)) {
            require $RutaControlador;
        } else {
            header('Location:' . $config->obtenerVariable('url') . 'error404.php');
        }

        //Si no existe la clase que buscamos y su accion, tiramos un error 404
        if (is_callable(array($nombreControlador, $nombreAccion)) == false) {
            header('Location:' . $config->obtenerVariable('url') . 'error404.php');
            return false;
        }

        //Si todo esta bien, creamos una instancia del controlador y llamamos a la accion 
        //$nombreControlador contiene el nombre del controlador a ejecutar en el primer caso contiene inicioControlador()
        $controlador = new $nombreControlador();
        //echo $_SESSION['tipo'].$_SESSION['acceso'].$_SESSION['username'];
        //verificamos el permiso de acceso segun el tipo de usuario
        //0=invitado, 1=alumno, 2=profesor, 3=administrador
        if (isset($_SESSION['tipo'])) {
            switch ($_SESSION['tipo']) {
                case 0:
                    $permiso = autentificacion::invitado($var);
                    break;
                case 1:
                    $permiso = autentificacion::alumno($var);
                    break;
                case 2:
                    $permiso = autentificacion::profesor($var);
                    break;
                case 3:
                    //echo '$permiso';
                    $permiso = autentificacion::administrador($var);
                    break;
                default:
                    break;
            }
        }//*/
        switch ($permiso) {
            case 1:
                //sin id
                $controlador->$nombreAccion();
                break;
            case 2:
                //con id
                $controlador->$nombreAccion($var['id']);
                break;
            case 3:
                //con id y num
                $controlador->$nombreAccion($var['id'], $var['subId']);
                break;
            case 4:
                //error
                header('location: ' . $config->obtenerVariable('url') . 'error404.php');
                break;
            default:
                break;
        }
    }
}

?>