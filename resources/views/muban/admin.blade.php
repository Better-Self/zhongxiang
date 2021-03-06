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
<script type="text/javascript" src="/luntan/lib//html5shiv.js"></script>
<script type="text/javascript" src="/luntan/lib//respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/luntan/static//h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static//h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/luntan/lib//Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/luntan/static//h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/luntan/static//h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/luntan/lib//DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>钟详论坛 v2.0</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">钟详论坛 v2.0</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">钟详</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"></span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
					</ul>
				</li>
			</ul>
			
		</nav>

		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>超级管理员</li>
				<li class="dropDown dropDown_hover">
				
					<a href="#" class="dropDown_A">{{\Auth::user()->name}}<i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
						<li><a href="#">切换账户</a></li>
						<li><a href="/admin/logout">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">


			@can($data[0])
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 全局管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/user" data-title="会员列表" href="javascript:;">会员列表</a></li>
					<li><a data-href="member-del.html" data-title="删除的会员" href="javascript:;">屏蔽词</a></li>
					<li><a data-href="member-level.html" data-title="等级管理" href="javascript:;">勋章管理</a></li>
					<li><a data-href="member-scoreoperation.html" data-title="积分管理" href="javascript:;">积分管理</a></li>
					<li><a data-href="member-record-browse.html" data-title="浏览记录" href="javascript:void(0)">用户组管理</a></li>
					<li><a data-href="member-record-download.html" data-title="下载记录" href="javascript:void(0)">操作管理</a></li>
					<li><a data-href="member-record-share.html" data-title="分享记录" href="javascript:void(0)">成长体系</a></li>
			</ul>
		</dd>
	</dl>
			@endcan
			@can($data[2])
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 城市管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/city" data-title="城市管理" href="javascript:void(0)">城市管理</a></li>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">栏目管理</a></li>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">导航管理</a></li>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">联系管理</a></li>
			</ul>
		</dd>

	</dl>
			@endcan
			@can($data[3])
	<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">未审核内容</a></li>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">已审核内容</a></li>
					<li><a data-href="/admin/types" data-title="资讯管理" href="javascript:void(0)">回收站</a></li>
			</ul>
		</dd>
	</dl>
			@endcan
			@can($data[4])
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="picture-list.html" data-title="图片管理" href="javascript:void(0)">待审核</a></li>
					<li><a data-href="/admin/usersList/search" data-title="用户列表" href="javascript:void(0)">用户列表</a></li>
			</ul>
		</dd>
	</dl>@endcan
			@can($data[5])
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 运营管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/friend" data-title="友情链接" href="javascript:void(0)">友情链接</a></li>
					<li><a data-href="product-category.html" data-title="分类管理" href="javascript:void(0)">广告位</a></li>
					<li><a data-href="product-list.html" data-title="产品管理" href="javascript:void(0)">头条推荐</a></li>
					<li><a data-href="product-list.html" data-title="产品管理" href="javascript:void(0)">头条助手</a></li>
			</ul>
		</dd>
	</dl>
			@endcan
			@can($data[1])
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理设置<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="/admin/role" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
					<li><a data-href="/admin/permissions" data-title="权限管理" href="javascript:void(0)">权限管理</a></li>
					<li><a data-href="/admin/user/1/role" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
					<li><a data-href="/admin/user/1/role" data-title="管理员列表" href="javascript:void(0)">管理员日志</a></li>
					<li><a data-href="/admin/sys" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
			</ul>
		</dd>
	</dl>
			@endcan
		
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			@yield('main')
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/luntan/lib//jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/luntan/lib//layer/2.4/layer.js"></script>
<script type="text/javascript" src="/luntan/static//h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/luntan/static//h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/luntan/lib//jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 


</body>
</html>