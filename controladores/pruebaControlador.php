<?php

class pruebaControlador extends baseControladores {

    //Accion inicio
    public function inicio() {
        $this->vista->desplegar("prueba", "prueba.php");
    }

}

?>