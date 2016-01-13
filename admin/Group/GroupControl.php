<?php
class GroupControl extends base{
    
    public function _filter(&$map){
        if(!empty($_REQUEST['name']))
            $map.=" and name like '%{$_REQUEST['name']}%'";
    }    
    
}