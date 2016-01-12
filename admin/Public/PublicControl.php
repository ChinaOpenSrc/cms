<?php
class PublicControl{
    function index(){
        
    }
    
    function getMenu(){
        $group=M("group")->where("1=1")->select();
        print_r($group);
//         foreach ($group as $k=>$v){
//             $group[$k]['node']=M()->select("select * from gd_node where group_id={$v['id']} and level=1");
//         }
        exit;
        return $group;
    }
}