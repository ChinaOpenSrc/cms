
    <form action="__URL__/update" id="j_custom_form"  class=" form-validate col-md-12 form-label-right center-margin" method="post" noEnter>
     	<input type="hidden" name="id" value="{$info.id}" >
		
		<input type="hidden" name="pid" value="{$info.pid}">
        <div class="pageContainer">
            <div class="form-row">
                <div class="form-label col-md-3">
                <label for="j_name">控制器名：</label>
                </div>
                <div class="form-input col-md-6">
                <input type="text" class="validate[required,custom[onlyLetterSp]] required" name="name" id="j_name" value="{$info.name}"  >
                <div class="font-yellow mrg10T">填写的为Controller的名称标识</div>
                </div>
            </div>
            <div class="form-row">
             <div class="form-label col-md-3">
                <label for="j_icon">图标：</label></div> 
                <div class="form-input col-md-5">
                <input type="text"  name="icon" id="j_icon" value="{$info.icon}"  >
            </div>
             </div>
            <div class="form-row">
            <div class="form-label col-md-3">
                <label for="j_title">显示名：</label> </div> 
                <div class="form-input col-md-5">
                <input type="text" class="validate[required] required" name="title" id="j_title" value="{$info.title}" >
            </div>
             </div>
            
           <div class="form-row">
           <div class="form-label col-md-3">
                <label for="j_group_id">分组：</label> </div>
                 <div class="col-md-5">
                <select name="group_id"  data-container="body"  id="j_group_id" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                               <option value="">未分组</option>
					<volist name="list" id="group">
						<option value="{$group.id}" <eq name="group.id" value="$info['group_id']">selected</eq>>{$group.title}</option>
						</volist>
                 </select>
                 
            </div>
             </div>
            <div class="form-row">
           <div class="form-label col-md-3">
                <label for="j_sort">排序：</label> </div>
                 <div class="form-input col-md-5">
                <input type="text" class="validate[required,custom[integer]] required" name="sort" id="j_sort" value="{$info.sort}" >
            </div>
             </div>
            <div class="form-row">
           <div class="form-label col-md-3">
                <label for="j_status">状态：</label> </div>
                 <div class="col-md-5">
               <select name="status"  data-container="body"  id="j_status" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                                <option <eq name="info.status" value="1" >selected</eq> value="1">启用</option>
                                <option <eq name="info.status" value="0" >selected</eq> value="0">禁用</option>
                
                 </select>
            </div>
             </div>
           <div class="form-row">
           <div class="form-label col-md-3">
                <label for="j_remark">模块名：</label> </div>
                 <div class="form-input col-md-5">
               
                <input type="text" class="validate[custom[onlyLetterSp]]" name="remark" id="j_remark" value="{$info.remark}"  >
               
                <div class="font-yellow mrg10T">不填默认为index模块</div>
               
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


	
