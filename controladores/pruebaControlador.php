<?php

class pruebaControlador extends baseControladores {

    public function inicio() {
        //Incluye el modelo que corresponde
        require 'modelos/pruebaModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new pruebaModelo();

        //Le pedimos al modelo todos los items usuarios
        $listado = $items->listarUsuarios();

        //Pasamos a la vista toda la informacion que se desea representar
        $data['listado'] = $listado;

        $this->vista->desplegar("prueba", "prueba.php",$data);
    }

}

?>