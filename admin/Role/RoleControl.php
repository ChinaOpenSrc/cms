<?php
class RoleControl extends base{
    function _filter($map){
        if(!empty($_REQUEST['name'])){
            $map->where("name like '%{$_REQUEST['name']}%'");
        }
    }
    
    public function access(){
        //获取当前用户组项目权限信息
        $menu = array();
        $menu = M("Node")->field("id,title,name")->where('level=1')->select();
        
        foreach ($menu as $k=>$v){
            $menu[$k]['node'] = M("Node")->field("id,title,name")->where("pid={$v['id']}")->select();
        }
        require tpl();
    }
    
    public function setGroup(){
        $data['role_id']=$_POST['role_id'];
        $data['node_id']=implode(",",$_POST['c1']);
        $list=M("access")->insert($data);
        if ($list !== false) {
            $this->mtReturn(200, '新增成功!');
        } else {
            $this->mtReturn(300, '新增失败!');
        }
    }
}