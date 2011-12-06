<?php
abstract class BaseControladores{
    
    protected $vista;
    
    function __construct()
    {
        $this->vista = new BaseVistas();
    }
}
?>