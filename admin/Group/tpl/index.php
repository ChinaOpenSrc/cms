<?php require DIR."/admin/Public/tpl/common.php";?>
<form  action="" method="post" id="formsearch">
    <div class="example-code">
    
        <div class="form-label float-left" >
           <label>组名称：</label>
        </div>
        
        <div class="form-input col-md-2">
            <input  type="text" value="<?php if(!empty($_REQUEST['name']))echo $_REQUEST['name']?>" name="name">
        </div>

        <button type="submit" class="btn medium bg-orange"> <span class="button-content"><i class="glyph-icon icon-search"></i>查询</span></button>
        <a class="btn medium bg-blue" href="javascript:clearQuery(this)"><span class="button-content"><i class="glyph-icon icon-undo"></i> 清空查询</span></a>
        <a href="<?=U("add")?>" target="dialog"  width="460px" height="380px"  title="新增菜单" class="btn medium bg-green"><span class="button-content"><i class="glyph-icon icon-plus"></i> 新增</span></a>
               
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
                    <a class="font-orange" href="<?=U("delete")?>"  title="确定要删除选中信息吗？" target="checkedAjaxTodo" idname="ids">
                        <i class="glyph-icon icon-trash-o"></i>删除选中</a>
                </li>
            </ul>
        </div>
                     
    </div>
    
    <div class="divider"></div>
</form>

<table class="table text-left"  id="zstable">
    <thead>
        <tr>
            <th class="nosort" width="30"></th>
            <th>分组名</th>
            <th>说明</th>
            <th>序号</th>
            <th width="40">状态</th>
            <th class="nosort" width="28"><input type="checkbox" class="checkboxCtrl j-icheck" group="ids"></th>
            <th class="nosort text-center" width="190">操作</th>
        </tr>
    </thead>
    <tbody>

       <?php if($record)foreach ($record as $v){?>
        <tr>
            <td></td>
            <td><?php echo $v['name']?></td>
            <td><?php echo $v['title']?></td>
            <td><?php echo $v['sort']?></td>
            <td class="text-center"><?php echo $v['status']?></td>
            <td><input type="checkbox" name="ids" class="j-icheck" value="<?php echo $v['id']?>"></td>
            <td>
                <a href="<?=U("edit")?>&id=<?php echo $v['id']?>"  class="btn small bg-blue" target="dialog" title="编辑菜单"  width="460px" height="380px" ><span class="button-content"><i class="glyph-icon icon-edit"></i> 编辑</span></a>
                <a href="<?=U("delete")?>&id=<?php echo $v['id']?>" class="btn small bg-red" target="ajaxTodo" title="确定要删除该行信息吗？"><span class="button-content"><i class="glyph-icon icon-trash-o"></i> 删除</span></a>
            </td>
        </tr>
      <?php }?>
      
    </tbody>
</table>
<?php require DIR."/admin/Public/tpl/foot.php";?>