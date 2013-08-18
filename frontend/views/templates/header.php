<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title?></title>
	<link href="/style/reset.css" rel="stylesheet" type="text/css" />
	<link href="/style/common.css?20130409" rel="stylesheet" type="text/css" />
	<?php foreach ($css as $css_file):?>
		<link href="/style/<?php echo $css_file;?>.css?20130409" rel="stylesheet" type="text/css" />
	<?php endforeach;?>
 	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<?php foreach ($js as $js_file):?>
		<script type="text/javascript" src="/script/<?php echo $js_file;?>.js"></script>
	<?php endforeach;?>
</head>

<body>
	
	<div id="header">
		<div id="header_logo">
			<a href="/" title="GraceAFurniture"><img src="/img/common/logo.png" /></a>
		</div>
		<div id="header_content">
			<p>
				<img src="/img/common/call-us-icon.png" /> call us 1-718-304-7977
				<span style="display: inline-block; width: 58px;"></span>
				 
				<a href="https://www.facebook.com/" target="_blank" title="Facebook"><img
					src="/img/common/facebook.jpg" /></a>
				<a href="https://twitter.com/" target="_blank" title="Twitter"><img
					src="/img/common/twitter.jpg" /></a>
				<a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><img
					src="/img/common/linkedin.jpg" /></a> 
				 
				<br />
				<form action="<?php echo base_url('search');?>" method="post">
					<input type="text" name="pid" value="Product Number"  maxlength="30" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}" />
					<input type="submit" name="submit" value="Search" />
				</form>
					
			</p>
		</div>
	</div>
	<!-- end of header -->

	<div id="main_nav">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/category/1">Table</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[1] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
			<li><a href="/category/2">Chair</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[2] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
			<li><a href="/category/3">Sofa</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[3] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
			<li><a href="/gallery">Gallery</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
	<!-- end of main_menu -->


	<div id="body">