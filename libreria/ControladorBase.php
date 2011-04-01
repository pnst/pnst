<?php
abstract class ControladorBase {
    
    protected $view;
    
    function __construct()
    {
        $this->view = new View();
    }
}
?>