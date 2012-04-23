<?php
class inicioControlador extends baseControladores{
    //Accion inicio
    public function inicio()
    {
        $this->vista->desplegar("inicio","inicio.php");
    }
}
?>