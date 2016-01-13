<?php
class PublicControl{
    
    function getMenu(){
        $group=M("group")->order("sort")->select();
        foreach ($group as $k=>$v){
            $group[$k]['node']=M("node")->where("group_id={$v['id']} and level=1")->select();
        }
        return $group;
    }
    
    public function login(){
        require tpl();
    }
    
    public function login_form(){
        $user=M("user")->where("username='{$_POST['username']}' and status=1")->find();
        if(!empty($user) & $user['password']==md5($_POST['password'])){
            echo 1;
            $_SESSION['user_id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['username']=$user['username'];
        }
    }
    
    public function mtReturn($status,$info,$navTabId='',$callbackType='closeCurrent',$forwardUrl='',$rel='', $type='') {
        $result['statusCode'] = $status; // dwzjs
        $result['navTabId'] = $navTabId; // dwzjs
        $result['callbackType'] = $callbackType; // dwzjs
        $result['message'] = $info; // dwzjs
        $result['forwardUrl'] = $forwardUrl;
        $result['rel'] = $rel;
        echo json_encode($result);
    }
    
}