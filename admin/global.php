<?php
define("DIR",str_replace("\\","/",dirname(__DIR__)));
define("__ROOT__",substr(DIR,strrpos(DIR,"/")));
$a_name=empty($_REQUEST['a'])?"index":$_REQUEST['a'];
$c_name=empty($_REQUEST['c'])?"Index":$_REQUEST['c'];
define("CNAME",$c_name);
define("ANAME",$a_name);
require DIR.'/include/common.php';
require DIR.'/include/mysql.php';
require DIR.'/include/config.php';

function __autoload($class_name){
    $class_name=str_replace("Control","",$class_name);
    $file=DIR."/admin/".$class_name."/".$class_name.'Control.php';
    if(file_exists($file)){
        require $file;
    }else{
        exit($file." is not found");
    }
}

function C($key=""){
    global  $_config;
    if($key){
        return $_config[$key];
    }else{
        return $_config;
    }
}

function inti(){
    
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
    if (class_exists($c)) {
        $_ENV[CNAME]=new $c;
        if(method_exists($c,ANAME)){
            $a_name=ANAME;
            $_ENV[CNAME]->$a_name();
        }else{
            exit("function ".ANAME." is not found");
        }
    }else{
        exit("class ".$c." is not found");
    }
    
}

function thisTpl($record){
    $file=DIR."/admin/Public/tpl/common.php";
    if(file_exists($file)){
        require $file;
    }else{
        exit($file." is not found!");
    }
}

function thisurl($c=CNAME,$a="index"){
    echo "index.php?c=$c&a=$a";
}