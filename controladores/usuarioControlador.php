<?php

class usuarioControlador extends BaseControladores {

    public function ingresar() {
        //Incluye el modelo que corresponde
        require 'modelos/usuarioModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $usuarios = new usuarioModelo();

        //Le pedimos al modelo todos los items
        $datosUsuario = $usuarios->encontrarUsuario($_POST['usuario'], $_POST['contrasena']);
        $n = 0;
        while ($item = $datosUsuario->fetch()) {
            $_SESSION['username'] = $item['usu_usuario'];
            $_SESSION['userid'] = $item['usu_id'];
            $_SESSION['tipo'] = $item['usu_tipo'];
            $_SESSION['acceso'] = true;
            //encontrar cursos asociados a el usuario
            $_SESSION['cursosInscritos'] = usuarioControlador::cursosInscritos($item['usu_id']);
            //encontrar foros asociados a los cursos inscritos por el usuario
            $_SESSION['forosAsociados'] = usuarioControlador::forosAsociados($item['usu_id']);
            $n++;
        }
        echo $n;
    }

    public function panel() {
        //Incluye el modelo que corresponde
        require 'modelos/usuarioModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $usuarios = new usuarioModelo();

        //Le pedimos al modelo todos los datos del usuario para desplegarlos en el panel
        $datosUsuario = $usuarios->datosUsuario($_SESSION['userid']);
      
        $this->vista->desplegar("panel", "panel.php"/* , $data */);
    }

    public function salir() {
        $config = Config::singleton();
        session_destroy();
        session_unset();
        $_SESSION['acceso'] = false;
        //al salir nos vamos a la pagina inicial
        header('Location:' . $config->obtenerVariable('url'));
        exit(0);
    }

    public function misCursos() {

        require_once 'modelos/usuarioModelo.php';

        $cursosUsuario = new usuarioModelo();

        $cantidadCursos = count($_SESSION['cursosInscritos']);

        for ($i = 0, $delta = 0; $i < $cantidadCursos; $i++) {
            //se pregunta por cada curso que tenga autorizado el usuario
            //si por alguna razon no puede acceder a determinado curso antes autorizado se aumenta un contador
            //con el cual se evita tener elementos errones en el vector, como por ejemplo el mismo valor de TEMP 2 veces
            if (($temp = $cursosUsuario->cursosUsuario($_SESSION['cursosInscritos'][$i]['idCurso'])->fetch())) {
                $datosCursosUsuario[$i - $delta] = $temp;
            } else {
                $delta++;
            }
        }
        
        unset($temp);
        
        require_once 'modelos/aulaModelo.php';
        //se llama a modelo de aula para utilizar los metodos de categorias y no tener que reescribirlo 2 veces
        
        $items = new aulaModelo();
        
        $listadoCategoriasPadres = $items->categorias();
        while ($objeto = $listadoCategoriasPadres->fetch()) {
            //cat_id cat_nombre cant_subcategoria
            $cat_padres['cat_id'] = $objeto['cat_id'];
            $cat_padres['cat_nombre'] = $objeto['cat_nombre'];
            $cat_padres['cant_subcategoria'] = $objeto['cant_subcategoria'];
            $temp[] = $cat_padres;
        }

        if (isset($temp)) {
            $listadoCategoriasPadres = $temp;
        } else {
            $listadoCategoriasPadres = "";
        }
        
        unset($temp);

        //Arreglamos las Subcategorias para acceder mas facilmente
        $listadoSubcategorias = $items->subcategorias();
        while ($objeto = $listadoSubcategorias->fetch()) {
            //cat_id cat_nombre cat_subcategoria
            $cat_padres['cat_id'] = $objeto['cat_id'];
            $cat_padres['cat_nombre'] = $objeto['cat_nombre'];
            $cat_padres['cat_subcategoria'] = $objeto['cat_subcategoria'];
            $temp[] = $cat_padres;
        }

        if (isset($temp)) {
            $listadoSubcategorias = $temp;
        } else {
            $listadoSubcategorias = "";
        }
        
        unset($temp);
        unset($objeto);
        
        $data['listadoCategoriasPadres'] = $listadoCategoriasPadres;
        $data['listadoSubcategorias'] = $listadoSubcategorias;
        $data['datosCursosUsuario'] = $datosCursosUsuario;
        
        $this->vista->desplegar("misCursos", "misCursos.php", $data);
    }

    public function misForos() {
        
        require_once 'modelos/usuarioModelo.php';

        $forosUsuario = new usuarioModelo();

        $cantidadForos = count($_SESSION['forosAsociados']);
        
        $datosForosUsuario = "";
        
        for ($i = 0, $delta = 0; $i < $cantidadForos; $i++) {
            //se pregunta por cada curso que tenga autorizado el usuario
            //si por alguna razon no puede acceder a determinado curso antes autorizado se aumenta un contador
            //con el cual se evita tener elementos errones en el vector, como por ejemplo el mismo valor de TEMP 2 veces
            if (($temp = $forosUsuario->forosUsuario($_SESSION['forosAsociados'][$i]['idForo'])->fetch())) {
                $datosForosUsuario[$i - $delta]['idForo'] = $_SESSION['forosAsociados'][$i]['idForo'];
                $datosForosUsuario[$i - $delta]['nombreForo'] = $_SESSION['forosAsociados'][$i]['nombreForo'];
                $datosForosUsuario[$i - $delta]['cantidadTemas'] = $temp['cantidadTemas'];
            } else {
                $delta++;
            }
        }
        
        unset($temp);
        
        $data['datosForosUsuario'] = $datosForosUsuario;
        
        $this->vista->desplegar("misForos", "misForos.php", $data);
    }

    public function actualizarInformacion() {
        switch ($_POST['informacion']) {
            case 1:
                /* insertar informacion basica */
                echo $_SESSION['userid'];
                print_r($_POST);
                echo 1;
                break;
            case 2:
                /* modificar contraseña */
                print_r($_POST);
                echo 1;
                break;
            case 3:
                /* actualizar numeros telefonicos */
                print_r($_POST);
                echo 1;
                break;
            default:
                break;
        }
    }

    private function nuevo() {
        $usuario = 'jofierro';
        $password = 'jerusalen22';
        $correo = 'jofierro131089@gmail.com';

        $encriptado = sha1(md5($password));

        echo "INSERT INTO  `lac`.`usuarios` (
            `usu_usuario` ,
            `usu_contrasena` ,
            `usu_verificacion` ,
            `usu_activado` ,
            `usu_nombre` ,
            `usu_email` ,
            `usu_avatar` 
        )
        VALUES ('$usuario','$encriptado','vereficacionManual','1','Jonathan Fierro','$correo','sin_avatar')";
    }
        
    private function cursosInscritos($idUsuario) {
        require_once 'modelos/usuarioModelo.php';

        $cursosUsuario = new usuarioModelo();

        $datosCursosInscritos = $cursosUsuario->encontrarCursos($idUsuario);
        //cursos incritos por el usuario
        $i = 0;
        while ($objeto = $datosCursosInscritos->fetch()) {
            $cursosInscritos[$i]['idCurso'] = $objeto['cur_id'];
            $cursosInscritos[$i]['nombreCurso'] = $objeto['cur_nombre'];
            $i++;
        }

        return $cursosInscritos;
    }

    private function forosAsociados($idUsuario) {
        require_once 'modelos/usuarioModelo.php';

        $forosUsuario = new usuarioModelo();

        $datosForosUsuario = $forosUsuario->encontrarForos($idUsuario);
        //foros asociados a los cursos inscritos por el usuario
        $i = 0;
        while ($objeto = $datosForosUsuario->fetch()) {
            $forosAsociados[$i]['idForo'] = $objeto['for_id'];
            $forosAsociados[$i]['nombreForo'] = $objeto['cur_nombre'];
            $i++;
        }
        return $forosAsociados;
    }

}

?>