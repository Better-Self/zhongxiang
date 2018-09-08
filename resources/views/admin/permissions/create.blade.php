<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
		<div id="tab-category" class="HuiTab">
			{{csrf_field()}}
			<div class="tabBar cl">
				<span>基本设置</span>
			
				
			</div>
			<div class="tabCon">
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						英文名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="name">
						
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						中文名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="title">
						
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
				<div class="formControls col-xs-8 col-sm-9 skin-minimal">
					<div class="radio-box">
						<input name="status" type="radio" id="sex-1" value="0" checked>
						<label for="sex-1">禁用</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="sex-2" name="status" value="1">
						<label for="sex-2">启用</label>
					</div>
				</div></div>
				<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">类型：</label>
				<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
					<select class="select" name="level" size="1">
						<option value="1">项目</option>
						<option value="2">功能</option>
						<option value="3">模块</option>
						
					</select>
					</span> </div>
				</div>
				<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">父节点：</label>
				<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
					<select class="select" name="pid" size="1">
						<option value="0">根节点</option>
						@foreach($data as $value)

						@if($value->level==1)
							<option  value="{{$value->id}}">{{$value->title}}</option>
						@else
							<option  value="{{$value->id}}"> &nbsp;&nbsp; |{{$value->title}}</option>
						@endif
						
						@endforeach
						
					</select>
					</span> </div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">排序：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="sort">
					</div>
					<div class="col-3">
					</div>
				</div>
			
			
				
			
			</div>
		
			
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius"  onclick="add()" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/luntan/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/luntan/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/luntan/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

		//添加的处理操作
	function  add(){
		
			//表单序列化
			str=$("#form-category-add").serialize();
			
			
			$.post('/admin/permissions',{'str':str,'_token':'{{csrf_token()}}'},function(data){

				if(data){
					layer.msg('添加成功!',{icon:1,time:1000});
					var index = parent.layer.getFrameIndex(window.name);
					parent.$('.btn-refresh').click();
					parent.layer.close(index);
					window.location.href = "/admin/permissions";
				}else{
					
				}

		});
			
	}




$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#tab-category").Huitab({
		index:0
	});
	// $("#form-category-add").validate({
	// 	rules:{
			
	// 	},
	// 	onkeyup:false,
	// 	focusCleanup:true,
	// 	success:"valid",
	// 	submitHandler:function(form){
	// 		//$(form).ajaxSubmit();
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		//parent.$('.btn-refresh').click();
	// 		parent.layer.close(index);
	// 	}
	// });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>