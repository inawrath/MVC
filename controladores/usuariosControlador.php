<?php

class usuariosControlador extends BaseControladores {

    public function ingresar() {
        //Incluye el modelo que corresponde
        require 'modelos/usuariosModelo.php';

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
            
            $n++;
        }
        echo $n;
    }

    public function panel() {
        //Incluye el modelo que corresponde
        require 'modelos/usuariosModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $usuarios = new usuarioModelo();

        //Le pedimos al modelo todos los datos del usuario para desplegarlos en el panel
        $datosUsuario = $usuarios->datosUsuario($_SESSION['userid']);
      
        $this->vista->desplegar("panel", "panelDeUsuarios.php"/* , $data */);
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
    
}

?>