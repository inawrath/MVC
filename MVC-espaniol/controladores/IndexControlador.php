<?php
class IndexControlador extends BaseControladores
{
    //Accion index
    public function index()
    {
        /**Finalmente presentamos nuestra plantillaHTML o vista 
        *tomando la funcion desplegar() de la clase vista 
        *creada instanciada en BaseControladores*/ 
        $this->vista->desplegar("index.php");
    }
}
?>