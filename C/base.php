<?php
class base{
    function __autoload($class_name) {
        require_once __ROOT__."/M/".$class_name.'Model.php';
    }
    
}