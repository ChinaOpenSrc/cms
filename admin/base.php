<?php
class base{
    
    public function index() {
        $model = M();
        $map="status=1";
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
    
        $voList= $model->where($map)->select();
        Tpl($voList);
    }
    
    public function insert() {
        $model = M();
        //保存当前数据对象
        exit();
        $list = $model->insert($_POST);
        if ($list !== false) {
            $this->mtReturn(200, '新增成功!');
        } else {
            $this->mtReturn(300, '新增失败!');
        }
    }
    
    public function add() {
        Tpl();
    }
    
    public function edit() {
        $model = M();
        $id = $_REQUEST ['id'];
        $vo = $model->where($map)->find();
        $this->display();
    }
    
    public function update() {
        $model = D($this->dbname);
        if (false === $data= $model->create()) {
    
            $this->mtReturn(300, $model->getError());
        }
        if (method_exists($this, 'before_update')) {
            $data = $this->before_update($data);
    
        }
        // 更新数据
        $list = $model->save($data);
        if (false !== $list) {
            if( method_exists($this, 'after_update')){
                $pk = $model->getPk ();
                $this->after_update($data[$pk]);
            }
            $this->mtReturn(200, '编辑成功!');
        } else {
    
            $this->mtReturn(300, '编辑失败!');
        }
    }
    
    
    function foreverdelete(){
        $model = D($this->dbname);
        if (! empty ( $model )) {
            $pk = $model->getPk ();
            $id = $_REQUEST ['id'];
            if (isset ( $id )) {
                if (method_exists($this, 'before_foreverdelete')) {
                    $this->before_foreverdelete($id);
                }
    
                $condition = array ($pk => array ('in', explode ( ',', $id ) ) );
                if (false !== $model->where ( $condition )->delete ()) {
                    if (method_exists($this, 'after_foreverdelete')) {
                        $this->after_foreverdelete($id);
                    }
                    $this->mtReturn(200, '删除成功！','','forward',cookie('_currentUrl_'));
                } else {
                    $this->mtReturn(300, '删除失败！');
                }
            } else {
                $this->mtReturn(300, '非法操作！');
            }
        }
        $this->forward ();
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