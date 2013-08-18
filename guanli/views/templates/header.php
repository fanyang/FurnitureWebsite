<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/guanli/style/common.css?20130324" rel="stylesheet" type="text/css" />
</head>

<body>
	
	<div id="header">
		<h1>GraceAFurniture</h1>
		<h1><?php echo $title;?></h1>
		<p>
			您好，
			<?php echo $this->session->userdata('username');?>
			<a href="/guanli/home/logout">[退出]</a>
			&nbsp;&nbsp;&nbsp;
			<a href="/" target="_blank">前台首页</a>
		</p>
		
	</div><!-- end of header -->

	<div id="body">
		<div id="main_nav">
			<ul>
				<li><a href="/guanli">首页</a></li>
				<li><a href="/guanli/config">系统设置</a></li>
				<li>分类管理</li>
				<ul>
					<li><a href="/guanli/category/view">查看分类</a></li>
					<li><a href="/guanli/category/add">添加分类</a></li>
					<li><a href="/guanli/category/delete">删除分类</a></li>
					<li><a href="/guanli/category/modify">修改分类</a></li>
				</ul>
				<li>产品管理</li>
				<ul>
					<li><a href="<?php echo base_url();?>product/view">产品列表</a></li>
					<li><a href="<?php echo base_url();?>product/add">添加产品</a></li>
				</ul>
				<li>画廊管理</li>
				<ul>
					<li><a href="<?php echo base_url();?>gallery/view">图片列表</a></li>
					<li><a href="<?php echo base_url();?>gallery/add">添加图片</a></li>
					<li><a href="<?php echo base_url();?>gallery/delete">删除图片</a></li>
				</ul>
			</ul>
		</div><!-- end of main_nav -->
	
		<div id="content">
	