<?php require DIR."/admin/Public/tpl/header.php";?>
<script type="text/javascript">
$(function(){
	//刷新验证码
    $(".reloadverify").click(function(){
    	changeverify();
     });
    
	function checklogin(){
		var issubmit = true;
		var i_index  = 0;
		$('#login_form').find('.in').each(function(i){
			if ($.trim($(this).val()).length == 0) {
				$(this).css('border', '1px #ff0000 solid');
				issubmit = false;
				if (i_index == 0)
					i_index  = i;
			}
		});
		if (!issubmit) {
			$('#login_form').find('.in').eq(i_index).focus();
			return false;
		}
		$("#login_ok").attr("disabled", true).val('登录中..');


        $.post($('#login_form').attr('action'),{username:$("#j_username").val(),password:$("#j_password").val()},function(data){
            if(data==1){
            	layer.statusinfo("登录成功",'success','','',3);
            	window.location.href ="<?=U('index',"Index")?>";
            }else{
            	layer.statusinfo("用户名或者密码错误",'error','','',3);
            	$("#login_ok").attr("disabled", false).val('登录');
            }
         });
	}
	
	$("#login_ok").click(function(){
		checklogin();
	});
	
	 $('body').keyup(function(event) {
         var keyCode = event.which;
         if (keyCode == 13) {
        	 checklogin();
         }
	 });
});


function genTimestamp(){
	var time = new Date();
	return time.getTime();
}

</script>
<block name="style">
<style>
<!--
.verifyimg{
cursor:pointer;
}
-->
</style>

<input type="hidden" name="isverify" id="isverify" value="{$isverify}" />

<div id="login-page" class="mrg25B">
    <div id="page-header" class="clearfix">
        <div id="page-header-wrapper" class="clearfix">
            <div id="header-logo">
            </div>
        </div>
    </div><!-- #page-header -->

</div>

<img src="<?=__ROOT__?>/Public/admin/images/login-bg.png" class="login-img" alt="">

<div class="ui-widget-overlay bg-black opacity-60"></div>
<div class="pad20A mrg25T">
    <div class="row mrg25T">
        <form action="<?=U('login_form')?>" id="login_form" class="col-md-4 form-vertical center-margin mrg25T" method="">
            <div class="ui-dialog modal-dialog mrg25T" id="login-form" style="position: relative !important;">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span class="ui-dialog-title">后台登录</span>
                </div>
                
                <div class="pad20A pad0B ui-dialog-content ui-widget-content ">
                    <div class="form-row">
                        <div class="form-label col-md-3">
                            <label for="">用户名:</label>
                        </div>
                        <div class="form-input col-md-9">
                            <div class="input-append-wrapper">
                                <div class="input-append  ui-state-default"><i class="glyph-icon icon-user"></i></div>
                                <div class="append-left">
                                    <input placeholder="username" id="j_username" class=" in" type="text" name="username" />
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="form-row">
                       <div class="form-label col-md-3"><label for="">密&nbsp;&nbsp;码:</label></div>
                       <div class="form-input col-md-9">
                            <div class="input-append-wrapper">
                                <div class="input-append  ui-state-default"><i class="glyph-icon icon-unlock-alt"></i></div>
                                <div class="append-left">
                                    <input placeholder="Password" id="j_password" class=" in" type="password" name="password" />
                                </div>
                            </div>
                       </div>
                   </div>
            
		            <div class="form-row"></div>
         
                </div>
                <div class="ui-dialog-buttonpane text-center">
                    <button type="button" id="login_ok" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4">
                        <span class="button-content">登&nbsp;&nbsp;录</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require DIR."/admin/Public/tpl/foot.php";?>