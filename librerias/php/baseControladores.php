<?php
abstract class baseControladores{
    
    protected $vista;
    
    function __construct()
    {
        $this->vista = new baseVistas();
    }
}
?>