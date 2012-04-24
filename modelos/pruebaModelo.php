<?php

class pruebaModelo extends baseModelos {

    public function listarUsuarios() {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM usuarios');
        $consulta->execute();
        //devolvemos la coleccion para que la vista la presente.
        return $consulta;
    }

}

?>