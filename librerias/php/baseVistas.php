<?php

class baseVistas {

    public function desplegar($pagina, $nombre, $variables = array()) {
        //$pagina contendra el nombre de la pagina en la que estamos pr ej: para http://localhost/LAC/aula/curso/ contendra curso
        //$nombre es el nombre de nuestra vista, por ej, listado.php
        //$variables es el contenedor de nuestras variables, es un arreglo del tipo llave => valor, opcional.

        $config = config::singleton();

        //Armamos la ruta a la vistaHTML 
        $vistaHtml = $config->obtenerVariable('carpetaVistas') . $nombre;

        //Si no existe el fichero en cuestion, tiramos un 404
        if (file_exists($vistaHtml) == false) {
            header('Location:' . $config->obtenerVariable('carpetaVistas') . 'error404.php');
            return false;
        }

        //Si hay variables para asignar, las pasamos una a una.
        //aca traspasamos a $algo lo que en el controlador quedo dentro de $data['algo']
        if (is_array($variables)) {
            foreach ($variables as $key => $value) {
                $$key = $value;
            }
        }

        echo '<!DOCTYPE html>'
        . '<html>';

        header::metasLibrerias($pagina);

        /*         * ********************************** */
        echo '<body>';
        //incluimos el panel superior, que contiene (logo - Lema - Usuario)
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelSuperior.php';
        //incluimos barra divisora
        echo '<div class="division1"></div>';

        //abrimos el contenedor principal
        echo '<div id="contenedor-principal">';
        echo '<div class="container_20">';
        //incluimos el menu
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelMenu.php';

        //panel-cuerpo
        echo '<div id="panel-cuerpo">';
        
        //panel-cambiante es lo que lleva las vistas =)
        echo '<section class="grid_13" id="panel-cambiante">';
        include $vistaHtml;
        echo '</section>';

        //incluimos el panel de publicidad
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelPublicidad.php';
        
        echo'<div class="clear"></div>';

        echo '</div>'; //fin panel-cuerpo
        echo '</div>'; //fin container
        echo '</div>'; //fin contenedor-principal
        
        //incluimos el panel inferior
        include $config->obtenerVariable('carpetaVistas') . 'partesFijas/panelInferior.php';

        echo '</body>';
        /*         * **************************************** */

        echo '</html>';
    }

}
/*
  El uso es bastante sencillo:
  $vista = new BaseVistas();
  $vista->desplegar('listado.php', array("nombre" => "Juan"));
 */
?>