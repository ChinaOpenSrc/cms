<?php require DIR."/admin/Public/tpl/common.php";?>

<form  action="" method="post" id="formsearch">
<div class="example-code">
    <div class="form-label float-left" ><label>昵称：</label></div>
    <div class="form-input col-md-2">
        <input  type="text" name="nickname" value="">
    </div>

    <button type="submit" class="btn medium bg-orange"> <span class="button-content">
        <i class="glyph-icon icon-search"></i>查询</span>
    </button>
    
    <a class="btn medium bg-blue" href="javascript:clearQuery(this)"><span class="button-content"><i class="glyph-icon icon-undo"></i> 清空查询</span></a>
    <a href="<?=U('add')?>" target="dialog"  width="440px" height="400px" rel="configadd" title="新增用户" class="btn medium bg-green"><span class="button-content"><i class="glyph-icon icon-plus"></i> 新增</span></a>
           
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
                <a class="font-orange" href=""  title="确定要删除选中信息吗？" target="checkedAjaxTodo" idname="ids"><i class="glyph-icon icon-trash-o"></i>删除选中</a>
            </li>
        </ul>
    </div>
                 
</div>

<div class="divider"></div>
</form>

<table class="table text-left"  id="zstable">
    <thead>
        <tr>
            <th>编号</th>
            <th>用户名</th>
    		<th>昵称</th>
    		<th>管理组</th>
    		<th>添加时间</th>
    		<th>上次登录</th>
    		<th>登录</th>
    		<th width="40">状态</th>
            <th class="nosort" width="30"><input type="checkbox" class="checkboxCtrl j-icheck" group="ids"></th>
            <th class="nosort text-center" width="250">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php if($record)foreach ($record as $v){?>
        <tr> 
            <td><?=$v['id']?></td>
			<td><?=$v['username']?></td>	
			<td><?=$v['id']?></td>
			<td><?=$v['id']?></td>
			<td><?=$v['id']?></td>
			<td><?=$v['id']?></td>
			<td><?=$v['last_login_time']?></td>
            <td class="text-center" ><?=$v['status']?></td>
            <td><input type="checkbox" name="ids" class="j-icheck" value="<?=$v['id']?>"></td>
            <td>
                <div class="mrg0A">
                    <a href="" rel="editmember<?=$v['id']?>"   class="btn small bg-blue" target="dialog"  width="440px" height="400px" ><span class="button-content"><i class="glyph-icon icon-edit"></i> 编辑</span></a>
                    <a href=""  class="btn small bg-orange" target="dialog"  width="420px" height="200" ><span class="button-content">修改密码</span></a>
                    <a href="" class="btn small bg-red" target="ajaxTodo" title="确定要删除该行信息吗？"><span class="button-content"><i class="glyph-icon icon-trash-o"></i> 删除</span></a>
                </div>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
</div>
<?php require DIR."/admin/Public/tpl/foot.php";?>