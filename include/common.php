<?php
function M($db_name=CNAME){
    $m= new mysqlDao();
    $m->tables=$db_name;
    return $m;
}

function getStatus($status, $imageShow = true) {
    switch ($status) {
        case 0 :
            $showText = '禁用';
            $showImg = '<i class="glyph-icon icon-lock font-orange font-size-18"></i>';
            break;
        case 2 :
            $showText = '待审';
            $showImg = '<i class="glyph-icon icon-question font-orange font-size-18"></i>';
            break;
        case 5 :
            $showText = '草稿';
            $showImg = '<i class="glyph-icon icon-file-text-alt font-orange font-size-18"></i>';
            break;
        case - 1 :
            $showText = '删除';
            $showImg = '<i class="glyph-icon icon-remove font-red font-size-18"></i>';
            break;
        case 1 :
        default :
            $showText = '正常';
            $showImg = '<i class="glyph-icon icon-check font-green font-size-18"></i>';
    }
    return ($imageShow === true) ? $showImg : $showText;
}

function showStatus($status, $id, $callback="") {
    switch ($status) {
        case 0 :
            $info = '<a href="'.U("resume&id=$id").'"  class="btn small bg-green" target="ajaxTodo"   ><span class="button-content"><i class="glyph-icon icon-building"></i> 启用</span></a>';
            break;
        case 2 :
            $info = '<a href="'.U("pass&id=$id").'"  class="btn small bg-green" target="ajaxTodo"  ><span class="button-content"><i class="glyph-icon icon-legal"></i> 批准</span></a>';
            break;
        case 5 :
            $info = '<a href="'.U("pass&id=$id").'"  class="btn small bg-green" target="ajaxTodo"  ><span class="button-content"><i class="glyph-icon icon-legal"></i> 批准</span></a>';
            break;
        case 1 :
            $info = '<a href='.U("forbid&id=$id").'  class="btn small bg-green" target="ajaxTodo"  ><span class="button-content"><i class="glyph-icon icon-minus-sign"></i> 禁用</span></a>';
            break;
        case - 1 :
            $info = '<a href="'.U("recycle&id=$id").'"  class="btn small bg-green" target="ajaxTodo"  ><span class="button-content"><i class="glyph-icon icon-repeat"></i> 还原</span></a>';
            break;
    }
    return $info;
}