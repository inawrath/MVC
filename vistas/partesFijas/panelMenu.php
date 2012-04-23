<nav class="grid_4" id="panelMenu">
    <div id="panelMenuFijo">
        <?php
        if (isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0') {
            $usuario = '<div id="panelMenuUsuario">';
            $usuario.='Bienvenido ' . $_SESSION['username'];
            $usuario.=''
                    . '<div><img src="'.$config->obtenerVariable('url').'img/menuUsuario/panelDeUsuario.png" witdh="16" height="16"/> <a href="'.$config->obtenerVariable('url').'usuario/panel" id="panelDeUsuario">Panel de usuario</a></li></div>'
                    //. '<div><img src="'.$config->obtenerVariable('url').'img/menuUsuario/mensajes.png" witdh="16" height="16"/> <a href="javascript:void(0);" id="mensajes">Mensajes</a></li></div>'
                    . '<div><img src="'.$config->obtenerVariable('url').'img/menuUsuario/salir.png" witdh="16" height="16"/> <a href="javascript:void(0);" id="salirSession">Salir</a></li></div>'
                    . '';
            $usuario.='</div>';
            echo $usuario;
        }
        ?>        <!-- <nav> html5 está diseñado para que aquí este la botonera de navegación principal. Puedes colocar cualquier etiqueta dentro, aunque lo recomendado es usar listas <ul>. -->
        <ul>
            <?php
            /*de esta forma todo quedaria de manera apropiada*/
            $menu = '<li><a href="' . $config->obtenerVariable('url') . '" class="';if ($pagina == 'inicio') {$menu.= 'botonSeleccionado';} else {$menu.= 'boton';} $menu.='">Inicio</a></li>';
            $menu .= '<li><a href="' . $config->obtenerVariable('url') . 'prueba" class="';if ($pagina == 'prueba') {$menu.= 'botonSeleccionado';} else {$menu.= 'boton';} $menu.='">Prueba</a></li>';
            echo $menu;
            ?>
        </ul>
    </div>
</nav>
