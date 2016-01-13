<?php require DIR."/admin/Public/tpl/common.php";?>
<form  action="" method="post" id="formsearch">
    <div class="example-code">
        <div class="form-label float-left" >
           <label>节点标识：</label>
        </div>
          
    <div class="form-input col-md-2">
        <input  type="text" value="<?php if(!empty($_POST['name']))echo $_POST['name']?>" name="name">
    </div>
    
    <button type="submit" class="btn medium bg-orange"> <span class="button-content"><i class="glyph-icon icon-search"></i>查询</span></button>
    <a class="btn medium bg-blue" href="javascript:clearQuery(this)"><span class="button-content"><i class="glyph-icon icon-undo"></i> 清空查询</span></a>
    <a href="<?php if(!empty($_GET['id']))echo U('add&id='.$_GET['id']);else echo U('add');?>" target="dialog"  width="460px" height="480px"  title="新增节点" class="btn medium bg-green"><span class="button-content"><i class="glyph-icon icon-plus"></i> 新增</span></a>
    
    <?php if(!empty($_GET['id'])){?>
        <a href="<?=U('index')?>"  title="节点管理" class="btn medium bg-green"> <span class="button-content">
        <i class="glyph-icon icon-mail-reply"></i> 返回</span></a>
    <?php }?>
    <div class="dropdown float-right mrg15R">
        <a href="javascript:;" class="btn medium bg-blue" title="Example dropdown" data-toggle="dropdown">
            <span class="button-content">
                <i class="glyph-icon icon-cog float-left"></i>批量操作<i class="glyph-icon icon-caret-down float-right"></i>
            </span>
        </a>
       
        <ul class="dropdown-menu float-right">
             <li class="hidden">
                <a href="" target="dwzExport">
                    <i class="glyph-icon icon-sign-out font-size-13 mrg5R"></i>
                    <span class="font-bold">导出全部</span>
                </a>
            </li>
             <li class="hidden">
                <a href="" target="checkedExport" idname="ids">
                    <i class="glyph-icon icon-sign-out font-size-13 mrg5R"></i>
                    <span class="font-bold">导出选中</span>
                </a>
            </li>
            <li class="divider hidden"></li>
            <li>
                <a class="font-orange" href=""  title="确定要删除选中信息吗？" target="checkedAjaxTodo" idname="ids">
                    <i class="glyph-icon icon-trash-o"></i>删除选中</a>
            </li>
        </ul>
    </div>
</div>

<div class="divider"></div>
</form>

<table class="table text-left"  id="zstable">
    <thead>
        <tr ><th class="nosort" width="30"></th>
			<th>标识</th>
			<th>菜单名</th>
			<th>分组</th>
			<th>序号</th>
			<th width="40">状态</th>
            <th class="nosort" width="30"><input type="checkbox" class="checkboxCtrl j-icheck" group="ids"></th>
            <th class="nosort text-center" width="190">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if($record)foreach ($record as $v){?>
        <tr>
            <td></td>
			<td><a href="<?=U('index&id='.$v['id'])?>" title="节点管理"><?=$v['name']?></a></td>
			<td><?=$v['title']?></td>
			<td><?=$group_arr[$v['group_id']]?></td>
			<td><?=$v['sort']?></td>
			<td class="text-center"><?=$v['status']?></td>
            <td><input type="checkbox" name="ids" class="j-icheck" value="<?=$v['id']?>"></td>
            <td>
                <a href="<?php U('edit&id='.$v['id'])?>"   class="btn small bg-blue" target="dialog" title="编辑节点"  width="460px" height="480px"><span class="button-content"><i class="glyph-icon icon-edit"></i> 编辑</span></a>
                <a href="<?php U('delete&id='.$v['id'])?>" class="btn small bg-red" target="ajaxTodo" title="确定要删除该行信息吗？"><span class="button-content"><i class="glyph-icon icon-trash-o"></i> 删除</span></a>
            </td>
        </tr>
      <?php }?>
      
    </tbody>
</table>
<?php require DIR."/admin/Public/tpl/foot.php";?>