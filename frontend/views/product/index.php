<div id="category_crumb_nav">
	<a href="/category">All</a>
	<?php for ($i = 1; $i < count($categories_tree); $i++): ?>
	<em>›</em> <a href="/category/<?php echo $categories_tree[$i]->id;?>"><?php echo $categories_tree[$i]->cname;?></a>
	<?php endfor;?>
</div>
<div id="product_title">
	<h1><?php echo $product->pname;?></h1>
</div>
<div id="product_imgs">
	<div id="big_img_background" onclick="hide_big_img()"></div>
	<div id="big_img">
		<h1><?php echo $product->pname;?></h1>
		<div id="big_img_close">
			<a href="javascript: hide_big_img()" title="Close"></a>
		</div>
		<div id="big_img_origin"><a href="<?php echo $product_imgs[0]->img_url;?>" target="_blank" title="Original"></a></div>
		
		<div id="big_img_pic"><img src="<?php echo $product_imgs[0]->img_url;?>"/></div>

	</div>
	
	<div id="product_img_div"><div onclick="show_big_img()"><img id="product_img" src="<?php echo $product_imgs[0]->medium_pic_url;?>"/><img style="position: absolute; top: 360px; left: 380px;" src="/img/product/zoom.png" /></div></div>
	<div id="thumb_imgs">
	<?php foreach ($product_imgs as $product_img): ?>
		<div><div onmouseover="change_img('<?php echo $product_img->medium_pic_url;?>', '<?php echo $product_img->img_url;?>')">
			<img src="<?php echo $product_img->thumb_url;?>" />
		</div></div>
	<?php endforeach;?>
	</div>
	<script type="text/javascript">
		function change_img(medium_pic_url, big_img_url)
		{
			document.getElementById("product_img").src = medium_pic_url;
			document.getElementById("big_img_pic").firstChild.src = big_img_url;
			document.getElementById("big_img_origin").firstChild.href = big_img_url;
		}
		
		function show_big_img()
		{
			var big_img_background_obj = document.getElementById("big_img_background");
			var big_img_obj = document.getElementById("big_img");
			
			big_img_background_obj.style.zIndex = 9999;
			big_img_background_obj.style.opacity = 0.5;
			big_img_obj.style.zIndex = 99999;
			big_img_obj.style.opacity = 1;
		}

		function hide_big_img()
		{
			
			var big_img_background_obj = document.getElementById("big_img_background");
			var big_img_obj = document.getElementById("big_img");

			big_img_obj.style.opacity = 0;
			big_img_obj.style.zIndex = -99999;
			big_img_background_obj.style.opacity = 0;
			big_img_background_obj.style.zIndex = -9999;
		}
	</script>
</div>
<div id="product_content">
	<?php echo $product->description;?>
</div>
<div style="clear: both;"></div>