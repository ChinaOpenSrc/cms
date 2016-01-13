<?php
require DIR.'/include/Rbac.class.php';
class base{
    
//     function __construct(){
        // 用户权限检查
//         if (!RBAC::AccessDecision()) {
            //检查认证识别号
//             if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
//                 //没有uid则跳转到认证网关
//                 redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
//             }else{
//                 $this->mtReturn(300,'对不起，您的权限不足！请不要越级操作！');
//             }
//             echo "<script> alert('权限不足');</script>";
//             echo "<script> alert('aaa');window.location='index.php?c=Public&a=login';</script>";
//         }exit;
//     }
    
    public function index() {
        $model = M();
        if (method_exists($this, '_filter')) {
            $this->_filter($model);
        }
    
        $record= $model->select();
        require Tpl();
    }
    
    public function insert() {
        $model = M();
        //保存当前数据对象
        $list = $model->insert($_POST);
        if ($list !== false) {
            $this->mtReturn(200, '新增成功!');
        } else {
            $this->mtReturn(300, '新增失败!');
        }
    }
    
    public function add() {
        require Tpl();
    }
    
    public function edit() {
        $model = M();
        $id = $_REQUEST ['id'];
        $vo = $model->where("id=$id")->find();
        require Tpl();
    }
    
    public function update() {
        $id=$_POST['id'];
        unset($_POST['id']);
        $list =  M()->where("id=$id")->update($_POST);
        if (false !== $list) {
            $this->mtReturn(200, '编辑成功!');
        } else {
            $this->mtReturn(300, '编辑失败!');
        }
    }
    
    public function delete() {
        if(!empty($_REQUEST ['id'])){
            $where="id={$_REQUEST ['id']}";
        }elseif(!empty($_GET['ids'])){
            $ids=$_GET['ids'];
            $where="id in($ids)";
        }
        $list=M()->where($where)->delete();
        if($list) {
            $this->mtReturn(200, '删除成功！');
        }else {
            $this->mtReturn(300, '删除失败！');
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
    
    public function selectedDelete() {
        $model = D($this->dbname);
        if (!empty($model)) {
            $pk = $model->getPk();
            $id = $_REQUEST ['ids'];
            if (isset($id)) {
                if (method_exists($this, 'before_selectedDelete')) {
                    $this->before_selectedDelete($id);
    
                }
    
                $condition = array($pk => array('in', explode(',', $id)));
                if (false !== $model->where($condition)->delete()) {
                    if (method_exists($this, 'after_selectedDelete')) {
                        $this->after_selectedDelete($id);
    
                    }
                    $this->mtReturn(200, '删除成功！','','forward',cookie('_currentUrl_'));
    
                } else {
                    $this->mtReturn(300, '删除失败！');
    
                }
            } else {
                $this->mtReturn(300, '非法操作');
    
            }
        }
        $this->forward();
    }
    
    public function forbid() {
        $model = D($this->dbname);
        $pk = $model->getPk();
        $id = $_REQUEST ['id'];
        $condition = array($pk => array('in', explode(',', $id)));
        $list = $model->where($condition)->setField('status',0);
        if ($list !== false) {
            $this->mtReturn(200, '禁用成功！','','forward',cookie('_currentUrl_'));
        } else {
            $this->mtReturn(300, '禁用失败！');
        }
    }
    
    function resume() {
        $model = D($this->dbname);
        $pk = $model->getPk();
        $id = $_GET ['id'];
        $condition = array($pk => array('in', explode(',', $id)));
        if (false !== $model->where($condition)->setField('status',1)) {
            $this->mtReturn(200, '恢复成功！','','forward',cookie('_currentUrl_'));
        } else {
            $this->mtReturn(300, '恢复失败！');
        }
    }
    
    public function willhidden() {
        $model = D($this->dbname);
        $pk = $model->getPk();
        $id = $_REQUEST ['id'];
        $condition = array($pk => array('in', explode(',', $id)));
        $list = $model->where($condition)->setField('show',0);
        if ($list !== false) {
            $this->mtReturn(200, '隐藏成功！','','forward',cookie('_currentUrl_'));
        } else {
            $this->mtReturn(300, '隐藏失败！');
        }
    }
    
    function willshow() {
        $model = D($this->dbname);
        $pk = $model->getPk();
        $id = $_GET ['id'];
        $condition = array($pk => array('in', explode(',', $id)));
        if (false !== $model->where($condition)->setField('show',1)) {
            $this->mtReturn(200, '显示成功！','','forward',cookie('_currentUrl_'));
        } else {
            $this->mtReturn(300, '显示失败！');
        }
    }
}