<?php require DIR."/admin/Public/tpl/common.php";?>


<form action="<?=U('setGroup')?>" id="j_custom_form" callback="TabAjaxDone" url="<?=U('index')?>" class="col-md-11 form-validate" method="post"  noEnter>
    <input type="hidden" name="role_id" VALUE="<?=$_REQUEST['role_id']?>" />
 
    <?php if($menu)foreach ($menu as $v){?>
        <div class="content-box mrg25B">
            <h3 class="content-box-header ui-state-default font-bold"><span><label><input type="checkbox" class="all c j-icheck" name="c1[]" id="list_<?=$v['id']?>" value="<?=$v['id']?>" />&nbsp;<?=$v['title']?></label></span></h3>
            <div class="content-box-wrapper">
                <?php foreach ($v['node'] as $v1){?>
                    <label><input type="checkbox"  class="one c j-icheck" name="c1[]" cid="list_<?=$v1['id']?>" value="<?=$v1['id']?>"/><?=$v1['title']?>&nbsp;</label>
                <?php }?>
             </div>
        </div> 
     <?php }?>
       
    <div class="actionBar text-right">
        <button type="button" class="btn medium bg-green " id="all">全选</button>
        <button type="button" class="btn medium bg-green  mrg15L" id="none">全不选</button>
        <button type="button" class="btn medium bg-green  mrg15L" id="invert">反选</button>
        <button type="submit" class="btn medium bg-blue mrg15L">保存</button>
        <button type="button" url="<?=U('index')?>" class="btn-close btn medium bg-red mrg15L">取消</button>
    </div>
</form>

<script language="javascript">
$('#invert').on('click', function(){
   $('.c').iCheck('toggle');
});
$('#all').on('click', function(){
	$(".c").iCheck('check'); 
});
$('#none').on('click', function(){
	$(".c").iCheck('uncheck'); 
});
$('.one').each(function(){
	$(this).on('ifChecked', function(){
         $(":checkbox[id='"+$(this).attr('cid')+"']").iCheck('check'); 
	 });
});
$('.all').each(function(){
	$(this).on('ifUnchecked', function(){
		$(":checkbox[cid='"+$(this).attr('id')+"']").iCheck('uncheck');
	});
});
</script>
<?php require DIR."/admin/Public/tpl/foot.php";?>