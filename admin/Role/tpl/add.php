<form action="<?=U("insert")?>" id="j_custom_form" class="col-md-12 form-label-right form-validate" method="post" noEnter>
    <div class="pageContainer">
        <div class="form-row">
            <div class="form-label col-md-3"><label>组名：</label></div>
            <div class="form-input col-md-7">
                <input type="text" class="validate[required,custom[chinese]] required" size="30" name="name" id="j_name" value=""  >
            </div>
        </div>
        
       <div class="form-row">
            <div class="form-label col-md-3"><label>组状态：</label></div>
            <div class="col-md-7">
                <select name="status"  data-container="body"  id="j_status" class="selectpicker show-tick validate[required]" data-style="btn medium bg-green" data-width="auto">
                    <option value="1">启用</option>
                    <option value="0">禁用</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-label col-md-3"><label>描述：</label></div>
            <div class="form-input col-md-7">
            <textarea name="remark" id="j_remark" class="autosize" rows="4" cols="30"></textarea>
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