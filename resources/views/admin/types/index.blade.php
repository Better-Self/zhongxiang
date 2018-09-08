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
	<link href="/luntan/lib/Hui-iconfont/1.0.9/iconfont.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/luntan/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/luntan/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>栏目管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	栏目管理
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">

		<a class="btn btn-primary radius" onclick="system_category_add('添加资讯','/admin/types/2')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加栏目</a>
		</span>
		<span class="r">共有数据：<strong>{{$count}}</strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">类型</th>

					<th>栏目名称</th>

					<th>添加子版块</th>

					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>

				@foreach($data as $value)
				<tr class="text-c">
					<td><input type="checkbox" name="" value=""></td>
					<td>{{$value->fid}}</td>
					{{--{{str_repeat("|-----",$tot)}}--}}
					@if($value->type=="group")
						<td><p class="c-green" style="font-weight: bold">大区</p></td>
					@elseif($value->type=="forum")
						<td><p class="c-blue" style="font-weight: bold">栏目</p></td>
					@else
						<td>主题</td>
					@endif

					<td class="text-l">{{$value->name}}</td>

					<td><a href="/admin/types/create/?fid={{$value->fid}}">    <i class="Hui-iconfont">&#xe604;</i></a></td>

					<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','/admin/types/{{$value->fid}}/edit','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="system_category_del(this,{{$value->fid}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<!-- 二级开始-->
				@foreach($value->zi as $two)
					<tr class="text-c">
						<td><input type="checkbox" name="" value=""></td>
						<td>{{$two->fid}}</td>
						{{--{{str_repeat("|-----",$tot)}}--}}
						@if($two->type=="group")
							<td><p class="c-green" style="font-weight: bolder">大区</p></td>
						@elseif($two->type=="forum")
							<td><p class="c-blue" style="font-weight: bolder">栏目</p></td>
						@else
							<td>主题</td>
						@endif
						<td class="text-l">|------{{$two->name}}</td>
						<td><a href="/admin/types/create/?fid={{$two->fid}}"><i class="Hui-iconfont">&#xe604;</i></a></td>

						<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','/admin/types/{{$two->fid}}/edit','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="system_category_del(this,{{$value->fid}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>


					{{--<!-- 三级开始-->--}}
					{{--@foreach($two->zi as $three)--}}
						{{--<tr class="text-c">--}}
							{{--<td><input type="checkbox" name="" value=""></td>--}}
							{{--<td>{{$three->fid}}</td>--}}
							{{--{{str_repeat("|-----",$tot)}}--}}
							{{--<td>{{$three->p}}</td>--}}
							{{--<td class="text-l">{{$three->name}}</td>--}}
							{{--<td><a href="/admin/types/create">添加</a></td>--}}
							{{--<td>--}}
							{{--</td>--}}
							{{--<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('栏目编辑','system-category-add.html','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>--}}
								{{--<a title="删除" href="javascript:;" onclick="system_category_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>--}}
						{{--</tr>--}}

					{{--@endforeach()--}}
					{{--<!-- 三级结束-->--}}

				@endforeach()
				<!-- 二级结束-->

				@endforeach()
				
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/luntan/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/luntan/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/luntan/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/luntan/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/luntan/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
	layer.confirm('与此相关栏目一起被删除，确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
            url: '/admin/types/'+id,
			dataType: 'json',
            data:{"_token":'{{csrf_token()}}','_method':'delete'},
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
</script>
</body>
</html>