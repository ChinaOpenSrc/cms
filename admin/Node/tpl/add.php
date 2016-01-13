<form action="<?=U('insert')?>" id="j_custom_form"  class=" form-validate col-md-12 form-label-right center-margin" method="post" noEnter>
	<input type="hidden" name="level" value="<?php if($_GET['id'])echo 2;else echo 1;?>">
	
    <div class="pageContainer">
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_name">标示名：</label></div>
            <div class="form-input col-md-6">
                <input type="text" class="validate[required,custom[onlyLetterSp]] required" name="name" id="j_name" value=""  >
                <div class="font-yellow mrg10T">控制器或方法名,节点包含的控制器或方法才受权限控制</div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_icon">图标：</label></div>
            <div class="form-input col-md-5">
                <input type="text"  name="icon" id="j_icon" value=""  >
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_title">显示名：</label> </div> 
                <div class="form-input col-md-5">
                <input type="text" class="validate[required] required" name="title" id="j_title" value="" >
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_group_id">分组：</label> </div>
            <div class="col-md-5">
                <select name="group_id"  data-container="body"  id="j_group_id" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                    <option value="">未分组</option>
        			<?php foreach ($role as $v){?>
        				<option value="<?=$v['id']?>"><?=$v['name']?></option>
        			<?php }?>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_sort">排序：</label> </div>
            <div class="form-input col-md-5">
                <input type="text" class="validate[required,custom[integer]] required" name="sort" id="j_sort" value="" >
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label for="j_status">状态：</label> </div>
            <div class="col-md-5">
                <select name="status"  data-container="body"  id="j_status" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                    <option value="1">启用</option>
                    <option value="0">禁用</option>
                </select>
            </div>
        </div>
        
        <div class="actionBar">
            <div class="form-input col-md-10 col-md-offset-3">
                <button type="button" class="btn medium bg-blue xubox_yes"> <span class="button-content">保存</span></button>
                <button type="button" class="btn medium bg-red mrg15L xubox_close"><span class="button-content">取消</span></button>
            </div>
        </div>
    </div>
</form>
			