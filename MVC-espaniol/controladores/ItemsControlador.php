<?php

class ItemsControlador extends BaseControladores {

    public function listarItems() {
        //Incluye el modelo que corresponde
        require 'modelos/ItemsModelo.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new ItemsModelo();

        //Le pedimos al modelo todos los items
        $listado = $items->listadoTotal();

        //Pasamos a la vista toda la información que se desea representar
        $data['listado'] = $listado;

        /** Finalmente presentamos nuestra plantillaHTML o vista 
         * tomando la funcion desplegar() de la clase vista 
         * creada instanciada en BaseControladores */
        $this->vista->desplegar("listar.php", $data);
    }

    public function agregarItems() {
        echo 'Aqui incluiremos nuestro formulario para insertar items';
    }

}

?>