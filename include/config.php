<?php
define("__ROOT__",dirname(__DIR__));

$_ENV['db_host']="localhost:3306";
$_ENV['db_user']="root";
$_ENV['db_pass']="";
$_ENV['db_name']="cms";
$_ENV['debug']=true;


$_ENV['m_name']=empty($_REQUEST['method'])?"index":$_REQUEST['method'];
$_ENV['c_name']=empty($_REQUEST['acl'])?"Index":$_REQUEST['acl'];