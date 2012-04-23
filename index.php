<?php

class index {

    static function main() {
        //Incluimos algunas clases
        require 'librerias/php/controlPrincipal.php';

        if (isset($_GET['route'])) {
            $var = index::obtenerVariablesUrl($_GET['route']);
            if ($var == FALSE) {
                //header('Location: http://pagina.algo/error404.php');
                header('Location: http://localhost/LAC/error404.php');
            } else {
                /* asignar variables */
                if (isset($var['0'])) {$variablesUrl['controlador'] = $var['0'];} else {$variablesUrl['controlador'] = 'inicio';}
                if (isset($var['1'])) {$variablesUrl['accion'] = $var['1'];} else {$variablesUrl['accion'] = 'inicio';}
                if (isset($var['2'])) {$variablesUrl['id'] = $var['2'];} else {$variablesUrl['id'] = '';}
                if (isset($var['3'])) {$variablesUrl['subId'] = $var['3'];} else {$variablesUrl['subId'] = '';}
            }
        } else {
            $variablesUrl['controlador'] = 'inicio';
            $variablesUrl['accion'] = 'inicio';
            $variablesUrl['id'] = '';
            $variablesUrl['subId'] = '';
        }

        /* if ($variablesUrl['controlador'] == 'aula' && $variablesUrl['accion'] == 'mostrar_num' && $variablesUrl['id'] == '') {

          //header('Location: http://pagina.algo/error404.php');
          header('Location: http://localhost/LAC/error404.php?error=id');
          break;
          }// */

        controlPrincipal::main($variablesUrl);
    }

    private static function limpiar($valor) {
        //permitimos solo letras(a-Z), numeros y guiones
        return preg_replace('/[^a-zA-Z0-9-_]/', '', $valor);
    }

    private static function obtenerVariablesUrl($url) {
        //quitamos la barra del final
        $url = preg_replace('/\/$/', '', $url);

        //separamos las partes/variables de la url y las contamos
        $variables = explode('/', $url);
        $cantVariables = count($variables);
        //limpiamos y acumulamos las variables
        for ($i = 0; $i < $cantVariables; $i++) {
            //Acumulamos los valores en un arreglo
            $variables[$i] = index::limpiar($variables[$i]);
        }

        return $variables;
    }

}

/* * * */
//se inicia sesion
session_start();
/* compruebo si el acceso a sido declarado y asigno a tipo 0 */
if (!isset($_SESSION['ACCESO'])) {
    //para comprobar que nadie a ingresado aun entonces tomo al personaje como invitado
    $_SESSION['tipo'] = 0;
}

//inicio la pagina
index::main();

?>