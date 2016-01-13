<?php
class NodeControl extends base{
    
    
    public function index(){
        $model=M();
        if(!empty($_POST['name'])){
           $model->where("name like '%{$_REQUEST['name']}%'");
        }
        
        if(!empty($_GET['id'])){
            $model->where("pid={$_REQUEST['id']}");
        }
        
        $record=$model->where("level=1")->select();
        
        $group=M("group")->select();
        
        $group_arr=array();
        foreach ($group as $v){
            $group_arr[$v['id']]=$v['title'];
        }
        require tpl();
    }
    
    public function add() {
        $role=array();
        $role=M('role')->where("status=1")->select();
        require Tpl();
    }
    
}