<?php
function __autoload($class_name){
    $class_name=str_replace("Control","",$class_name);
    require DIR."/admin/".$class_name."/".$class_name.'Control.php';
}

function C($key=""){
    require DIR.'/include/config.php';
    if($key){
        return $_config[$key];
    }else{
        return $_config;
    }
}

function inti(){
    $a_name=empty($_REQUEST['a'])?"index":$_REQUEST['a'];
    $c_name=empty($_REQUEST['c'])?"Index":$_REQUEST['c'];
    define("CNAME",$c_name);
    define("ANAME",$a_name);
    if(version_compare(PHP_VERSION,'5.4.0','<')) {
        ini_set('magic_quotes_runtime',0);
    }else{
        define('MAGIC_QUOTES_GPC',false);
    }
    if(C("debug")==false){
        ini_set("display_errors", "off");
    }
    if(C("debug")==true){
        ini_set("display_errors", "on");
    }

    $c=CNAME."Control";
    $_ENV[CNAME]=new $c;
    $_ENV['M']=new mysqlDao();
    $_ENV[CNAME]->$a_name();
    
}

function tpl(){
    require DIR."/admin/Public/tpl/common.php";
}

