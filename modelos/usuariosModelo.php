<?php

class usuarioModelo extends baseModelos {

    public function encontrarUsuario($usuario, $contrasena) {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT usu_usuario,usu_contrasena,usu_id,usu_tipo FROM usuarios WHERE usu_usuario= :usuario && usu_contrasena=:contrasena LIMIT 1');
        $consulta->bindParam(":usuario", $usuario);
        $encriptada = sha1(md5($contrasena));
        $consulta->bindParam(":contrasena", $encriptada);
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

    public function datosUsuario($idUsuario) {
        $sentencia = 'SELECT * FROM usuarios WHERE usu_id = :id ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $idUsuario);
        $consulta->execute();
        return $consulta;
    }

    public function actualizarDatos($idUsuario, $informacion, $datos) {
        switch ($informacion) {
            case '1':
                /* insertar informacion basica */

                $sentencia = 'UPDATE ';
                $consulta = $this->db->prepare($sentencia);
                $consulta->bindParam(":id", $idUsuario);
                $consulta->execute();
                return $consulta;

                break;
            case '2':
                /* modificar contraseña */

                break;
            case '3':
                /* actualizar numeros telefonicos */

                break;
            default:
                break;
        }
    }

}

?>