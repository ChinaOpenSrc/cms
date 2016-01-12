<?php
class PublicControl{
    
    function getMenu(){
        $group=M("group")->order("sort")->select();
        foreach ($group as $k=>$v){
            $group[$k]['node']=M("node")->where("group_id={$v['id']} and level=1")->select();
        }
        return $group;
    }
}