<?php
class GroupControl extends base{
//     public function index(){
//         $group=M()->select();
        
//         $record=array($group);
//         Tpl($record);
//     }
    
    function delete(){
        $this->mtReturn();
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