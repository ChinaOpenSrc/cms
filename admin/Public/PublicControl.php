<?php
class PublicControl{
    function index(){
        return 111;
    }
    
    function getMenu(){
        $group=$_ENV['M']->select("select * from gd_group");
        foreach ($group as $k=>$v){
            $group[$k]['node']=$_ENV['M']->select("select * from gd_node where group_id={$v['id']} and level=2");
        }
        return $group;
    }
}