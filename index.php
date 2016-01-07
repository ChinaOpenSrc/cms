<?php
header("content-type:text/html;charset=utf-8");

require 'include/config.php';
require 'include/common.php';
require 'include/mysql.php';

echo __ROOT__;

function __autoload($class_name) {
    require __ROOT__."/C/".$class_name.'.php';
}

function inti(){
    if(version_compare(PHP_VERSION,'5.4.0','<')) {
        ini_set('magic_quotes_runtime',0);
    }else{
        define('MAGIC_QUOTES_GPC',false);
    }
    
    if($_ENV['debug']==false){
        ini_set("display_errors", "off");
    }
    if($_ENV['debug']==true){
        ini_set("display_errors", "on");
    }
    
    $c.="Control";
    $r=new $c;
    if($c!=$m){
        $r->$m();
    }
    $GLOBALS['endrun']=true;
}

inti();
?>