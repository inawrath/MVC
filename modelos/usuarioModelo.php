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

    public function encontrarCursos($idUsuario) {

        $sentencia = 'SELECT c.cur_id, c.cur_nombre FROM cursos c, usuarios_has_cursos uc ' .
                'WHERE uc.Usuarios_usu_id = :id AND uc.Cursos_cur_id = c.cur_id';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $idUsuario);
        $consulta->execute();

        return $consulta;
    }

    public function encontrarForos($idUsuario) {

        $sentencia = 'SELECT f.for_id, c.cur_nombre FROM usuarios_has_cursos uc, cursos c, foros f ' .
                'WHERE uc.Usuarios_usu_id = :id AND c.cur_id = uc.Cursos_cur_id AND f.for_fk_cur_id = c.cur_id';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":id", $idUsuario);
        $consulta->execute();

        return $consulta;
    }

    public function cursosUsuario($idCurso) {

        $sentencia = 'SELECT C.cur_id, C.cur_nombre, U.usu_nombre, C.cur_descripcion, C.cur_informacionEnlace, C.cur_profesor ' .
                'FROM cursos C INNER JOIN usuarios U ON C.cur_profesor = U.usu_id ' .
                'WHERE C.cur_id = :idCurso ';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":idCurso", $idCurso);
        $consulta->execute();

        return $consulta;
        //*/
    }

    public function forosUsuario($idForo) {

        $sentencia = 'SELECT COUNT(temf_fk_for_id) as cantidadTemas ' .
                'FROM temasforos ' .
                'WHERE temf_fk_for_id = :idForo';
        $consulta = $this->db->prepare($sentencia);
        $consulta->bindParam(":idForo", $idForo);
        $consulta->execute();

        return $consulta;
        //*/
    }

    public function cursoGratuito($idCurso) {

        $sentencia = 'SELECT C.cur_tipo ' .
                'FROM cursos C ' .
                'WHERE C.cur_id = :idCurso';

        $consulta = $this->db->prepare($sentencia);

        $consulta->bindParam(":idCurso", $idCurso);
        $consulta->execute();
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