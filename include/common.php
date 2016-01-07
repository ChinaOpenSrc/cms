<?php
function display($name=""){
    $name=$name==""?$_ENV['M_NAME']:$name;
    require __ROOT__.'/V/'.$name.".php";
}