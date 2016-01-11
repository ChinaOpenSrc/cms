<?php
header("content-type:text/html;charset=utf-8");
define("DIR",str_replace("\\","/",dirname(__DIR__)));
define("__ROOT__",substr(DIR,strrpos(DIR,"/")));
require DIR.'/include/mysql.php';
require 'global.php';
inti();
?>