<?php
function M($db_name=CNAME){
    $m= new mysqlDao();
    $m->tables=$db_name;
    return $m;
}

