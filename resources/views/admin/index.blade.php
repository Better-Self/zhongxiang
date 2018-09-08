@extends('muban.admin')

@section('main')
<!-- 内容 -->
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用同城头条 !</p>
	<p>登录次数：18 </p>
	<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">待处理事项</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>待审核会员</th>
				<th>待审核个人资料</th>
				<th>待审核内容</th>
				<th>待审核相册</th>
				
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>92</td>
				<td>9</td>
				<td>0</td>
				<td>8</td>
			
			</tr>
		
		
		
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName"></span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?php  echo $_SERVER['HTTP_HOST']; ?></td>
			</tr>
			
			<tr>
				<td>服务器端口 </td>
				<td><?php  echo $_SERVER['SERVER_PORT']; ?></td>
			</tr>
			<tr>
				<td>服务器版本 </td>
				<td><?PHP echo PHP_VERSION; ?></td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td><?PHP echo dirname(__FILE__); ?></td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td><?PHP echo PHP_OS; ?></td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td><?PHP echo $_SERVER['DOCUMENT_ROOT']; ?></td>
			</tr>
			
		
		
			<tr>
				<td>服务器当前时间 </td>
				<td><?php  
					echo date("Y-m-d G:i:s"); ?></td>
			</tr>
		
			
			
			
			
			<tr>
				<td>当前SessionID </td>
				<td><?php session_start(); echo session_id(); ?></td>
			</tr>
		
		</tbody>
	</table>
</div>

@endsection     