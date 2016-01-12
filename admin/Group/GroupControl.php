<?php
class GroupControl extends base{
    public function index(){
        $group=M()->select();
        $this->_search();
        $record=array($group);
        Tpl($record);
    }
    
    public function add(){
        Tpl();
    }
    
    function delete(){
        $this->mtReturn();
    }
    
    function insert(){
        
    }
    
    public function mtReturn($status=200,$info="成功",$navTabId='',$callbackType='closeCurrent',$forwardUrl='',$rel='', $type='') {
        $result['statusCode'] = $status; // dwzjs
        $result['navTabId'] = $navTabId; // dwzjs
        $result['callbackType'] = $callbackType; // dwzjs
        $result['message'] = $info; // dwzjs
        $result['forwardUrl'] = $forwardUrl;
        $result['rel'] = $rel;
        echo json_encode($result);
    }
}