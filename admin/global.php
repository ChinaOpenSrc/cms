<?php
define("DIR",str_replace("\\","/",dirname(__DIR__)));//项目根目录绝对路径
$a_name=empty($_REQUEST['a'])?"index":$_REQUEST['a'];
$c_name=empty($_REQUEST['c'])?"Index":$_REQUEST['c'];

define("CNAME",$c_name);
define("ANAME",$a_name);
require DIR.'/include/common.php';
require DIR.'/include/mysql.php';
require DIR.'/include/config.php';
require DIR.'/admin/base.php';



function __autoload($class_name){
    $class_name=str_replace("Control","",$class_name);
    $file=DIR."/admin/".$class_name."/".$class_name.'Control.php';
    if(file_exists($file)){
        require $file;
    }else{
        exit($file." is not found");
    }
}

function C($key="",$val=""){
    $c=new config();
    if($key && $val==""){
        return $c->_config[$key];
    }elseif($key && $val==""){
        return $c->_config;
    }elseif ($key && $val){
        $c->_config[$key]=$val;
    }
}

function init(){
    
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

function tpl($record=null){
    $file=DIR.'/admin/'.CNAME."/tpl/".ANAME.".php";
    if(file_exists($file)){
        return $file;
    }else{
        return "模板文件  $file 不存在";
    }
}

function U($a=null,$c=CNAME){
    if($a==null){
        $a=ANAME;
    }
    return "index.php?c=$c&a=$a";
}