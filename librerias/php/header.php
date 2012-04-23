<?php

class header {

    public static function metasLibrerias($nombrePagina) {
        $head = '<head>';
        $head .='<title>' . $nombrePagina . '</title>';
        $head .= header::metas();
        $head .= header::externas($nombrePagina);
        $head .= header::css($nombrePagina);
        $head .= header::javascript($nombrePagina);
        $head .= '</head>';
        echo $head;
    }

    private static function metas() {
        $config = config::singleton();

        $head = '<meta http-equiv="Content-Language" content="Spanish" />';
        $head.= '<meta http-equiv="content-type" content="text/HTML; charset=UTF-8" />';
        $head.= '<meta http-equiv="content-style-type" content="text/css" />';
        $head.= '<meta http-equiv="content-style-type" content="text/javascript" />';
        $head.= '<meta name="author" content="Jonathan Andrés Fierro Sandoval - Iván Edgardo Nawrath Castillo" />';
        $head.= '<link rel="icon" type="imagenes/ico" href="' . $config->obtenerVariable('Favicon') . '" />';

        return $head;
    }

    private static function externas($nombrePagina) {
        $config = config::singleton();
        //incluimos jquery
        $head ="";
        $head .= '<script type="text/javascript" src="' . $config->obtenerVariable("carpetaExt") . 'jquery.js"></script>';
        //incluimos jquery simplemodal para desplegar información en una pantalla modal
        $head .= '<script type="text/javascript" src="' . $config->obtenerVariable("carpetaExt") . 'jquery.simplemodal.js"></script>';
        
        //incluimos los elementos para que funcione 1200grid
        $head .= '<link href="' . $config->obtenerVariable("carpetaExt") . 'reset.css" rel="stylesheet" />';
        $head .= '<link href="' . $config->obtenerVariable("carpetaExt") . 'text.css" rel="stylesheet" />';
        $head .= '<link href="' . $config->obtenerVariable("carpetaExt") . '1200.css" rel="stylesheet" />';

        
        //incluimos fons desde http://www.google.com/webfonts
        //$head .='<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine"/>';

        /* HTML5 Enabling Script
         * Permite usar las etiquetas semanticas HTML5 dentro de IE6, 7 y 8 como si fueran
         * divs normales, estilizables por CSS. Sin este script,
         * las etiquetas son ignoradas en IE y es imposible
         * agregarles diseño a ellas o cualquier elemento dentro de ellas.
         */
        $HTML5EnablingScript = '<!--[if lt IE 9]>';
        $HTML5EnablingScript .='<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
        $HTML5EnablingScript .='<![endif]-->';
        //incluyo el HTML5EnablingScript a head para que sea incluido en el head
        $head.=$HTML5EnablingScript;
        
        return $head;
    }

    private static function css($nombrePagina) {
        $config = config::singleton();
        $head ="";
        
        $head .= '<link href="' . $config->obtenerVariable("carpetaCss") . 'default.css" rel="stylesheet" />';

        $css = "librerias/css/" . $nombrePagina . ".css";
        if (is_file($css)) {
            $head.='<link href="' . $config->obtenerVariable("carpetaCss") . $nombrePagina . '.css" rel="stylesheet" />';
        }
        return $head;
    }

    private static function javascript($nombrePagina) {
        $config = config::singleton();

        $head = "";
        
        //incluimos el default en el caso que agregemos codigo por defecto para todos
        $head .= '<script type="text/javascript" src="' . $config->obtenerVariable("carpetaJs") . 'default.js"></script>'; 
        
        //incluimos control de usuarios
        $head .= '<script type="text/javascript" src="' . $config->obtenerVariable("carpetaJs") . 'usuarios.js"></script>';

        /* funciones de la pagina si es que existen las agregamos */
        $js = "librerias/js/" . $nombrePagina . "Funciones.js";
        if (is_file($js)) {
            $head.='<script type="text/javascript" src="' . $config->obtenerVariable("carpetaJs") . $nombrePagina . 'Funciones.js"></script>';
        }

        $js = "librerias/js/" . $nombrePagina . ".js";
        if (is_file($js)) {
            $head.='<script type="text/javascript" src="' . $config->obtenerVariable("carpetaJs") . $nombrePagina . '.js"></script>';
        }
        
        return $head;
    }

}

?>