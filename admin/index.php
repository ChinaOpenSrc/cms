<?php
header("content-type:text/html;charset=utf-8");

require '../include/config.php';
require '../include/mysql.php';

function __autoload($class_name) {
    require __ROOT__."/admin/$class_name/".$class_name.'.php';
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
    
    $c=empty($_REQUEST['acl'])?"Index":$_REQUEST['acl'];
    $m=empty($_REQUEST['method'])?"index":$_REQUEST['method'];
    $_ENV['M_NAME']=$m;
    $_ENV['C_NAME']=$c;
    $c.="Control";
    $r=new $c;
    if($c!=$m){
        $r->$m();
    }
    $GLOBALS['endrun']=true;
}

inti();
?>