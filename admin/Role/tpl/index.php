<?php require DIR."/admin/Public/tpl/common.php";?>
<form action="" method="post" id="formsearch">
    <div class="example-code">
        <div class="form-label float-left" ><label>组名：</label></div>
        <div class="form-input col-md-2">
            <input type="text" value="<?php if(!empty($_REQUEST['name']))echo $_REQUEST['name']?>" name="name" size="10" />
        </div>
        <button type="submit" class="btn medium bg-orange"> <span class="button-content"><i class="glyph-icon icon-search"></i>查询</span></button>
        <a class="btn medium bg-blue" href="javascript:clearQuery(this)"><span class="button-content"><i class="glyph-icon icon-undo"></i> 清空查询</span></a>
        <a href="<?=U('add')?>" target="dialog"  title="新增管理组" rel="roleadd" width="500px" height="400px" class="btn medium bg-green"><span class="button-content"><i class="glyph-icon icon-plus"></i> 新增</span></a> 
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
                    <a class="font-orange" href="<?=U('delete')?>"  title="确定要删除选中信息吗？" target="checkedAjaxTodo" idname="ids"><i class="glyph-icon icon-trash-o"></i>删除选中</a>
                </li>
            </ul>
        </div>
    </div>
<div class="divider"></div>   
</form>
 
<table class="table text-left"  id="zstable">
    <thead>
        <tr><th class="nosort" width="30"></th>
        <th>组名</th>
			<th width="50">状态</th>
			<th width="100">描述</th>
			<th>创建时间</th>
			<th class="nosort text-center" width="40"><input type="checkbox" class="checkboxCtrl j-icheck" group="ids"></th>
            <th class="nosort text-center" width="250">操作</th>
        </tr>
    </thead>
    <tbody>

       <?php if($record)foreach ($record as $v){?>
        <tr> 
            <td></td>
			<td><?=$v['name']?></td>
			<td><?=getStatus($v['status']);?></td>
			<td><?=$v['remark']?></td>
			<td><?=$v['create_time'];?></td>
			<td class="text-center"><input type="checkbox" name="ids" class="j-icheck" value="{$vo['id']}"></td>
			<td>
                <a href="<?=U('access&role_id='.$v['id'])?>" rel="roleaccess" class="btn bg-green small" title="<?=$v['name']?> 权限设置 " ><span class="button-content"><i class="glyph-icon icon-shield"></i> 授权</span> </a>
                <a href="<?=U('edit&id='.$v['id'])?>" rel="roleedit<?=$v['id']?>" title="编辑<?=$v['name']?>" class="btn bg-green small" target="dialog"   width="500px" height="400px" ><span class="button-content"><i class="glyph-icon icon-edit"></i> 编辑</span></a>
                <?=showStatus($v['status'],$v['id']);?>           
                <a href="<?=U('delete&id='.$v['id'])?>" class="btn bg-red small" target="ajaxTodo" title="确定要删除该行信息吗？"><span class="button-content"><i class="glyph-icon icon-trash-o"></i> 删除</span></a>
            </td>
      </tr>
      <?php }?>
      
    </tbody>
</table>
<?php require DIR."/admin/Public/tpl/foot.php";?>