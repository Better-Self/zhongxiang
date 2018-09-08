<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/luntan/lib/html5shiv.js"></script>
<script type="text/javascript" src="/luntan/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/luntan/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/luntan/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>编辑用户</title>

</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-add1"  >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" disabled value="{{$data->name}}" placeholder="" id="username" name="name">
			<div id="userinfo">
				
				
				</div>
			</div>
			<input type="hidden" name="id" value="{{$data->id}}">
		</div>
	

		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				@if($data->sex ==1)
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="1" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex"  value="0">
					<label for="sex-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-3" name="sex"  value="2">
					<label for="sex-3">保密</label>
				</div>
				@elseif($data->sex ==0)
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="1" >
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex" checked value="0">
					<label for="sex-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-3" name="sex"  value="2">
					<label for="sex-3">保密</label>
				</div>
				@else
				<div class="radio-box">
					<input name="sex" type="radio" id="sex-1" value="1" >
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="sex"  value="0">
					<label for="sex-2">女</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-3" name="sex" checked value="2">
					<label for="sex-3">保密</label>
				</div>
				@endif
				
				
				
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				@if($data->statu ==1)
				<div class="radio-box">
					<input name="statu" type="radio" id="sex-1" value="0" >
					<label for="sex-1">禁用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="statu" value="1" checked>
					<label for="sex-2">正常</label>
				</div>
				@else
				<div class="radio-box">
					<input name="statu" type="radio" id="sex-1" value="0" checked>
					<label for="sex-1">禁用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="statu" value="1">
					<label for="sex-2">正常</label>
				</div>

				@endif
				
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->mobile}}" placeholder="" id="mobile" name="mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="@" value="{{$data->email}}"  name="email" id="email">
			</div>
		</div>
	

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="beizhu" cols="" rows="" class="textarea"   placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)">{{$data->beizhu}}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius"   onclick="save1({{$data->id}})"  value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/luntan/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/luntan/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/luntan/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
function save1(id){
		str=$("#form-admin-add1").serialize();
	
		$.ajax({
			type: 'POST',
			url: '/admin/user/'+id,
			dataType: 'json',
			data:{"_token":'{{csrf_token()}}',str:str,"_method":"put"},
			success: function(data){
				layer.msg('添加成功!',{icon:1,time:1000});
					var index = parent.layer.getFrameIndex(window.name);
					parent.$('.btn-refresh').click();
					parent.layer.close(index);
			},
			error:function(data) {
				layer.msg('error!',{icon:1,time:1000});
			},
		});	

	
			// $(form).ajaxSubmit({
				
			// 	type: 'post',
			// 	url: "xxxxxxx" ,
			// 	success: function(data){
			// 		layer.msg('添加成功!',{icon:1,time:1000});
			// 	},
   //              error: function(XmlHttpRequest, textStatus, errorThrown){
			// 		layer.msg('error!',{icon:1,time:1000});
			// 	}
			// });
			// var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		
}
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add1").validate({
		rules:{
			name:{
				required:true,
				minlength:4,
				maxlength:16
			},
			
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			city:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		// submitHandler:function(form){
		// 	$(form).ajaxSubmit({
		// 		alert(111);
		// 		type: 'post',
		// 		url: "xxxxxxx" ,
		// 		success: function(data){
		// 			layer.msg('添加成功!',{icon:1,time:1000});
		// 		},
  //               error: function(XmlHttpRequest, textStatus, errorThrown){
		// 			layer.msg('error!',{icon:1,time:1000});
		// 		}
		// 	});
		// 	var index = parent.layer.getFrameIndex(window.name);
		// 	parent.$('.btn-refresh').click();
		// 	parent.layer.close(index);
		// }
	});
});

</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>