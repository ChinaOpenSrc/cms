<?php
class IndexControl extends base{
    public function index(){
        $a=11111;
        require tpl();
    }
    
    public function add(){
        return array("a","bbb","ccccc");
    }
}